<?php

namespace App\DataAccess\DAO;

use App\DataAccess\Database;

class OrderItemDAO
{
    /**
     * @param Database $db
     * @param int $orderNumber
     * @param array $orderItemDetails
     * @return void
     */
    public function insertOrderItem(Database $db, int $orderNumber, array $orderItemDetails): void
    {
        $sql = 'INSERT INTO `order_items` (`order_number`, `menu_item`, `quantity`)
                VALUES (:orderNumber, :menuItem, :quantity);';

        $pdo = $db->getConnection()->prepare($sql);

        $pdo->bindParam(':orderNumber', $orderNumber);
        $pdo->bindParam(':menuItem', $orderItemDetails['menuItemNumber']);
        $pdo->bindParam(':quantity', $orderItemDetails['quantity']);

        $pdo->execute();
    }

    /**
     * @param Database $db
     * @param int $orderNumber
     * @param int $menuItemId
     * @return void
     */
    public function deleteOrderItem(Database $db, int $orderNumber, int $menuItemId): void
    {
        $sql = 'DELETE FROM `order_items` WHERE `order_number` = :orderNumber AND `menu_item` = :menuItem;';

        $pdo = $db->getConnection()->prepare($sql);

        $pdo->bindParam(':orderNumber', $orderNumber);
        $pdo->bindParam(':menuItem', $menuItemId);

        $pdo->execute();
    }
}
