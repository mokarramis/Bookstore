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
        foreach ($bookItems as $bookItem) {
            $bookItem = BookItem::where('id', $bookItem)->first();
            if (!$bookItem) {
                continue;
            }
            $subtotal += $bookItem->price;
        }

        $order = Order::create([
            'subtotal' => $subtotal,
        ]);

        $order->items()->attach($bookItems);

        return $order;
    }
}