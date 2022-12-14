<?php

namespace App\Services\Validators;

use App\DataAccess\DAO\ValidationDAO;

class OrderNumberValidator
{
    public static function validateOrderNumber(int $orderNum): bool
    {
        if (ValidationDAO::checkIfExists($orderNum, '`orders`', '`order_number_id')) {
            return true;
        } else {
            return false;
        }
    }
}