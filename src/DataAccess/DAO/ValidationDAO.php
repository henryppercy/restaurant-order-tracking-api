<?php

namespace App\DataAccess\DAO;

use App\DataAccess\Database;
use PDO;

class ValidationDAO
{
    public static function checkIfExists(Database $db, int $id, string $tableName, string $columnName): bool
    {
        $sql = 'SELECT ' . $columnName . ' FROM ' . $tableName . ' WHERE ' . $columnName . ' = :id;';

        $pdo = $db->getConnection()->prepare($sql);

        $pdo->bindParam(':id', $id);

        $pdo->execute();

        $pdo->setFetchMode(PDO::FETCH_NUM);

        $result = $pdo->fetch();

        if($result) {
            return true;
        }

        return $result;
    }
}