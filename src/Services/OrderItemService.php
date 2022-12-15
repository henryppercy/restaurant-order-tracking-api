<?php

namespace App\Services;

use App\DataAccess\DAO\OrderItemDAO;
use App\DataAccess\Database;
use App\Services\Validators\OrderItemIdValidator;
use App\Services\Validators\OrderNumberValidator;
use App\Services\Validators\QuantityValidator;
use App\Services\Validators\StatusValidator;

class OrderItemService
{
    private Database $db;
    private int $statusCode;
    private int $orderNumber;
    private OrderNumberValidator $orderNumberValidator;
    private OrderItemIdValidator $orderItemIdValidator;
    private StatusValidator $statusValidator;
    private OrderItemDAO $orderItemDAO;

    /**
     * @param Database $db
     * @param OrderNumberValidator $numberValidator
     * @param OrderItemIdValidator $orderItemIdValidator
     * @param StatusValidator $statusValidator
     */
    public function __construct(Database $db, OrderNumberValidator $orderNumberValidator, OrderItemIdValidator $orderItemIdValidator, StatusValidator $statusValidator)
    {
        $this->db = $db;
        $this->numberValidator = $orderNumberValidator;
        $this->orderItemIdValidator = $orderItemIdValidator;
        $this->statusValidator = $statusValidator;
        $this->statusCode = 400;
    }


    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     */
    public function setStatusCode(int $statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return int
     */
    public function getOrderNumber(): int
    {
        return $this->orderNumber;
    }

    /**
     * @param int $orderNumber
     */
    public function setOrderNumber(int $orderNumber): void
    {
        $this->orderNumber = $orderNumber;
    }

    public function postNewOrderItem(array $orderItemDetails): array
    {
        $responseData = [
            'success' => false,
            'message' => 'Something went wrong.',
            'data' => []
        ];

        try {
            if(
                QuantityValidator::validateQuantity($orderItemDetails['quantity']) &&
                $this->orderNumberValidator->validateOrderNumber($this->getOrderNumber()) &&
                $this->orderItemIdValidator->validateOrderItemNumber($orderItemDetails['menuItemNumber']) &&
                $this->statusValidator->validateStatus($this->getOrderNumber())
            )   {
                $this->orderItemDAO->insertOrderItem($this->getOrderNumber(), $orderItemDetails);
                $responseData = [
                    'success' => true,
                    'message' => 'Item successfully added.',
                    'data' => []
                ];
                $this->setStatusCode(200);
            }
        } catch (\PDOException $exception) {
            $responseData['message'] = $exception->getMessage();
            $this->setStatusCode(500);
        }

        return $responseData;
    }
}
