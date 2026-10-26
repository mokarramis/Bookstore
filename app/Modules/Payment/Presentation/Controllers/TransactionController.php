<?php

namespace App\Modules\Payment\Presentation\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Order\Application\Service\OrderService;
use App\Modules\Order\Presentation\Request\OrderRequest;
use App\Modules\Payment\Domain\Service\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function __construct(public TransactionService $transactionService)
    {
      
    }

    public function create(OrderRequest $request)
    {
        $data = $request->validated();
        $transaction = $this->transactionService->createTransaction($data);

        return success('transaction created', $transaction);
    }

    public function callback(Request $request)
    {
        $authority = $request->Authority;
        $status = $request->Status;
        
        $this->transactionService->callback($authority, $status);
    }
}