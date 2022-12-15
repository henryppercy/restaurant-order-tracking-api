<?php

namespace App\Services\Validators;

use App\DataAccess\DAO\ValidationDAO;
use App\DataAccess\Database;

class OrderItemIdValidator
{
    /**
     * @param int $menuItemNum
     * @return bool
     */
    public function validateOrderItemNumber(Database $db, int $menuItemNum): bool
    {
        return (ValidationDAO::checkIfExists($db, $menuItemNum, '`menu_items`', '`id`'));
    }
}
