<?php

namespace App\DataAccess\DAO;

use App\DataAccess\Database;
use App\Entities\NewOrder;

class NewOrderDAO
{
    /**
     * @param Database $db
     * @param array $orderDetails
     * @return void
     */
    public function postNewOrderToDb(Database $db, array $orderDetails): void
    {
        $sql = 'INSERT INTO `orders`
                (`customer_name`, `customer_email`, `delivery_address`, `order_status`)
                VALUES
                (:customerName, :customerEmail, :deliveryAddress, 1);';

        $pdo = $db->getConnection()->prepare($sql);

        $pdo->bindParam(':customerName', $orderDetails['customerName']);
        $pdo->bindParam(':customerEmail', $orderDetails['customerEmail']);
        $pdo->bindParam(':deliveryAddress', $orderDetails['deliveryAddress']);

        $pdo->execute();
    }

    /**
     * @param Database $db
     * @return string
     */
    public function getNewOrderNumber(Database $db, NewOrder $newOrder): NewOrder
    {
        $sql = 'SELECT MAX(`order_number_id`) FROM `orders`;';

        $pdo = $db->getConnection()->prepare($sql);

        $pdo->execute();

        $pdo->setFetchMode(\PDO::FETCH_NUM);

        $result = $pdo->fetch();

        $newOrder->setOrderNumberId($result[0]);

        return $newOrder;
    }
}
