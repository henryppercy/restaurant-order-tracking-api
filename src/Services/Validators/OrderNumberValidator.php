<?php

namespace App\Services\Validators;

use App\DataAccess\DAO\ValidationDAO;
use App\DataAccess\Database;

class OrderNumberValidator
{
    /**
     * @var Database
     */
    private Database $db;

    /**
     * @param Database $db
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * @param int $orderNum
     * @return bool
     */
    public function validateOrderNumber(int $orderNum): bool
    {
        return (ValidationDAO::checkIfExists($this->db, $orderNum, '`orders`', '`order_number_id`'));
    }
}