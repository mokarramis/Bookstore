<?php

namespace App\Modules\Backoffice\Presentation\Requests\Roles;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
          'name' => ['required', 'string', 'max:100'],
        ];
    }
}