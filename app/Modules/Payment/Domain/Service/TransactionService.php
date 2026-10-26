<?php

namespace App\Modules\Payment\Domain\Service;

use App\Modules\Payment\Infrastructure\Model\Transaction;

class TransactionService
{
    const HEADER = [
          'Content-Type: application/json',
          'Accept: application/json'
    ];

    public function __construct(public RequestService $requestService){}

    public function createTransaction(array $data)
    {
        $postData = [
            "merchant_id" => config('services.zarinpal.merchant_id'),
            "amount" => $data['amount'],
            "callback_url" => $data['callback_url'],
            "referrer_id" => $data['referrer_id'],
            "description" => $data['description'],
            "metadata" => [
              "mobile" => $data['mobile'],
              "email" => $data['email']
            ]
        ];

        $resp = $this->requestService->send($data['url'], $postData, self::HEADER);

        if (!isset($resp['data']['authority'])) {
            return $resp['errors'];
        }

        $authority = $resp['data']['authority'];

        $transaction = Transaction::create([
            'order_id' => $data['order_id'],
            'amount' => $data['amount'],
            'callback' => $data['callback_url'],
            'description' => $data['description'],
            'authority' => $authority,
        ]); 

        $link = config('services.zarinpal.start_url') . $authority;

        return $link;
    }

    public function callback(string $authority, string $status)
    {
        if ($status=="NOK") {
            return false;
        }

        $transaction = Transaction::where('authority', $authority)->firstOrFail();
        $resp = $this->verifyTransaction($authority, $transaction);

        if (!isset($resp['data']['authority'])) {
            return $resp['errors'];
        }

        // to make it idempotent
        if ($transaction->status == 'paid') {
            return true;
        }

        $transaction->update([
          'status' => 'paid',
        ]);

        return true;
    }

    public function verifyTransaction(string $authority, Transaction $transaction)
    {
        $url = config('services.zarin.verify_url');
        $data = [
            'authority' => $authority,
            'amount' => $transaction->amount,
            'merchant_id' => $transaction->merchant_id
        ];

        $resp = $this->requestService->send($url, $data, self::HEADER);

        return $resp;
    }
}

