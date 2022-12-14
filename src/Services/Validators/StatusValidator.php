<?php

namespace App\Services\Validators;

use App\DataAccess\DAO\ValidationDAO;
use App\DataAccess\Database;

class StatusValidator
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

    public static function validateStatus(int $orderNum): bool
    {
        return (ValidationDAO::checkIfStatusInProgress(self::$db, $orderNum));
    }
}