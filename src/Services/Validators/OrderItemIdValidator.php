<?php

namespace App\Services\Validators;

use App\DataAccess\DAO\ValidationDAO;
use App\DataAccess\Database;

class OrderItemIdValidator
{
    /**
     * @var Database
     */
    private static Database $db;

    /**
     * @param Database $db
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public static function validateOrderItemNumber(int $menuItemNum): bool
    {
        if (ValidationDAO::checkIfExists(self::$db, $menuItemNum, '`menu_items`', '`id')) {
            return true;
        } else {
            return false;
        }
    }
}