<?php

namespace App\Modules\Order\Presentation\Request;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'book_items' => ['required'],
        ];
    }

}