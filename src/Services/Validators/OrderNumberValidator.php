<?php

namespace App\Services\Validators;

use App\DataAccess\DAO\ValidationDAO;
use App\DataAccess\Database;

class OrderNumberValidator
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

    public static function validateOrderNumber(int $orderNum): bool
    {
        return (ValidationDAO::checkIfExists(self::$db, $orderNum, '`orders`', '`order_number_id`'));
    }
}