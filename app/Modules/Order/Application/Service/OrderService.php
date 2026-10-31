<?php

namespace App\Modules\Order\Application\Service;

use App\Enum\OrderStatusEnum;
use App\Modules\Catalog\Infrastructure\Models\BookItem;
use App\Modules\Order\Infrastructure\Models\Coupon;
use App\Modules\Order\Infrastructure\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function preparePayment(Request $request, Order $order)
    {
        $subtotal = $order->subtotal;
        
        if ($requestCoupon = $request->coupon) {
            $subtotal = $this->applyCoupon($requestCoupon, $subtotal);
        }

        $order->update([
            'status' => OrderStatusEnum::PENDING->value,
            'total_amount' => $subtotal,
            'pay_method' => $request->pay_method,
        ]);

        return $order;
        
    }

    public function applyCoupon($requestCoupon, $totalAmount)
    {
        $coupon = Coupon::where('value', $requestCoupon)->where('expires_at', '>', now())->lockForUpdate()->firstOrFail();
        DB::transaction(function() use($coupon){
            if ($coupon->used_count < $coupon->total_count) {
                throw new Exception('coupon invalid');
            }

            $coupon->increment('used_count');
        });

        $totalAmount = $totalAmount - $totalAmount * ($coupon->discount);

        return $totalAmount;
    }

    public function createOrder(array $data): Order
    {
        $subtotal = 0;
        $bookItems = $data['book_items'];
        $pivotData = [];

        foreach ($bookItems as $item) {
            $bookId = $item['id'];
            $bookCount = $item['count'];
            $bookItem = BookItem::where('id', $bookId)->first();
            if (!$bookItem) {
                continue;
            }
            $subtotal += $bookItem->price * $item['count'];
            $pivotData[$bookId] = [
                'count' => $bookCount,
            ];
        }

        $order = DB::transaction(function() use($subtotal, $pivotData){
            $order = Order::create([
                'subtotal' => $subtotal,
            ]);

            $order->items()->syncWithoutDetaching($pivotData);

            return $order;
        });

        return $order;
    }
}