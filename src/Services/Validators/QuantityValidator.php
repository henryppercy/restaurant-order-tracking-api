<?php

namespace App\Services\Validators;

class QuantityValidator
{
    /**
     * @param int $orderNum
     * @return bool
     */
    public static function validateQuantity(int $orderNum): bool
    {
        return !($orderNum < 1);
    }
}
