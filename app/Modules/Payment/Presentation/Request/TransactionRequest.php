<?php

namespace App\Modules\Payment\Presentation\Request;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "amount" => 'required|integer',
            "callback_url" => 'required|string|url',
            "referrer_id" => 'nullable|string',
            "description" => 'nullable|string',
            "mobile" => 'nullable|string|13',
            "email" => "nullable|email|string"
        ];
    }

}