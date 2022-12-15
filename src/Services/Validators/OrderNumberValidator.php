<?php

namespace App\Services\Validators;

use App\DataAccess\DAO\ValidationDAO;
use App\DataAccess\Database;

class OrderNumberValidator
{
    /**
     * @param int $orderNum
     * @return bool
     */
    public function validateOrderNumber(Database $db, int $orderNum): bool
    {
        return (ValidationDAO::checkIfExists($db, $orderNum, '`orders`', '`order_number_id`'));
    }
}
