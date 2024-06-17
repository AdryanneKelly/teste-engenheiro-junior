<?php

namespace App\Enums;

enum StatusOrderEnum: string
{
    case PENDING = 'pending';
    case PAID = 'paid';
    case DECLINED = 'declined';

    public function labels(): string
    {
        return match ($this) {
            self::PENDING => 'Em aberto',
            self::PAID => 'Pago',
            self::DECLINED => 'Cancelado',
        };
    }
}
