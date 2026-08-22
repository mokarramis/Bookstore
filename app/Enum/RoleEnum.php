<?php

namespace App\Enum;

use App\Modules\Authentication\Infrastructure\Database\Models\User;

enum RoleEnum: string
{
    case User = 'user';
    case Admin = 'admin';

    public function resolve()
    {
        return match ($this) {
            self::User => User::class
            // self::Admin => Admin::class,
        };
    }
}
