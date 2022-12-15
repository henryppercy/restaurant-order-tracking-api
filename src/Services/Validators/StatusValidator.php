<?php

namespace App\Services\Validators;

use App\DataAccess\DAO\ValidationDAO;
use App\DataAccess\Database;

class StatusValidator
{

    /**
     * @param int $orderNum
     * @return bool
     */
    public function validateStatus(Database $db, int $orderNum): bool
    {
        return (ValidationDAO::checkIfStatusInProgress($db, $orderNum));
    }
}
