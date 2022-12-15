<?php

namespace App\Services\Validators;

use App\DataAccess\Database;

class AddOrderItemValidator
{
    private OrderNumberValidator $orderNumberValidator;
    private OrderItemIdValidator $orderItemIdValidator;
    private StatusValidator $statusValidator;
    /**
    @param Database $db
    @param OrderNumberValidator $numberValidator
    @param OrderItemIdValidator $orderItemIdValidator
    @param StatusValidator $statusValidator
     */
    public function __construct(OrderNumberValidator $orderNumberValidator, OrderItemIdValidator $orderItemIdValidator, StatusValidator $statusValidator)
    {
        $this->orderNumberValidator = $orderNumberValidator;
        $this->orderItemIdValidator = $orderItemIdValidator;
        $this->statusValidator = $statusValidator;
    }

    public function validateNewOrderItem(Database $db, int $orderNumber, array $orderItemDetails): bool
    {
        if (!$this->orderNumberValidator->validateOrderNumber($db, $orderNumber)) {
            throw new \Exception("Order number doesn't yet exist.");
        }

        if (!$this->statusValidator->validateStatus($db, $orderNumber)) {
            throw new \Exception("Order is not in progress.");
        }

        if (!$this->orderItemIdValidator->validateOrderItemNumber($db, $orderItemDetails['menuItemNumber'])) {
            throw new \Exception("Menu item doesn't exist.");
        }

        if (!$this->orderItemIdValidator->validateOrderItemAlreadyExists($db, $orderNumber, $orderItemDetails['menuItemNumber'])) {
            throw new \Exception("Menu item already added to order.");
        }

        if (!QuantityValidator::validateQuantity($orderItemDetails['quantity'])) {
            throw new \Exception("Item quantity should be above zero.");
        }

        return true;
    }
}
