<?php

namespace App\Services\Validators;

use App\DataAccess\DAO\ValidationDAO;
use App\DataAccess\Database;

class StatusValidator
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
    public function validateStatus(int $orderNum): bool
    {
        return (ValidationDAO::checkIfStatusInProgress($this->db, $orderNum));
    }
}
