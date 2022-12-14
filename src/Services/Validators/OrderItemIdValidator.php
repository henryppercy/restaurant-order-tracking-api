<?php

namespace App\Services\Validators;

use App\DataAccess\DAO\ValidationDAO;
use App\DataAccess\Database;

class OrderItemIdValidator
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
     * @param int $menuItemNum
     * @return bool
     */
    public function validateOrderItemNumber(int $menuItemNum): bool
    {
        return (ValidationDAO::checkIfExists($this->db, $menuItemNum, '`menu_items`', '`id`'));
    }
}