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

    public static function checkIfStatusInProgress(Database $db, int $orderNum): bool
    {
        $sql = 'SELECT `order_status` FROM `orders` WHERE `order_id_number` = :id;';

        $pdo = $db->getConnection()->prepare($sql);

        $pdo->bindParam(':id', $orderNum);

        $pdo->setFetchMode(PDO::FETCH_NUM);

        $result = $pdo->fetch();

        // 1 represents an order which is still 'in progress'
        return $result[0] == 1;
    }
}
