<?php

namespace App\DataAccess\DAO;

use App\DataAccess\Database;

class ValidationDAO
{
    public static function checkIfExists(Database $db, int $id, string $tableName, string $columnName)
    {
        $sql = 'SELECT ' + $columnName + ' FROM ' + $tableName + ' WHERE ' + $columnName + ' = :id;';

        $pdo = $db->getConnection()->prepare($sql);

        $pdo->bindParam(':id', $id);

        $pdo->execute();


    }
}