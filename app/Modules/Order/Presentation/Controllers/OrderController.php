<?php

namespace App\Modules\Order\Presentation\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Order\Application\Service\OrderService;
use App\Modules\Order\Presentation\Request\OrderRequest;

class OrderController extends Controller
{
    public function createOrderFirstStep(OrderRequest $request, OrderService $orderService)
    {
        $data = $request->validated();
        $order = $orderService->createOrder($data);

        return success('order created', $order);
    }
}