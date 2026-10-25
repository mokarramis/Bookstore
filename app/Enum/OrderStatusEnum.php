<?php

namespace App\Enum;

enum OrderStatusEnum: string
{
    case PENDING = 'pending';
    case PAID = 'paid';
    case UNPAID = 'unpaid';

    public function resolve()
    {
        return match ($this) {
            self::PENDING => 'معلق',
            self::PAID => 'پرداخت شده',
            self::UNPAID => 'پرداخت نشده',
        };
    }
}