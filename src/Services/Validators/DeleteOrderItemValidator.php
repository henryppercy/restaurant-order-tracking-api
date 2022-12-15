<?php

namespace App\Services\Validators;

use App\DataAccess\Database;

class DeleteOrderItemValidator
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

    public function validateOrderItem(Database $db, int $orderNumber, array $menuItemId): bool
    {
        if (!$this->orderNumberValidator->validateOrderNumber($db, $orderNumber)) {
            throw new \Exception("Order number doesn't yet exist.");
        }

        if (!$this->statusValidator->validateStatus($db, $orderNumber)) {
            throw new \Exception("Order is not in progress.");
        }

        if (!$this->orderItemIdValidator->validateOrderItemNumber($db, $menuItemId['menuItemNumber'])) {
            throw new \Exception("Menu item doesn't exist.");
        }

        if ($this->orderItemIdValidator->validateOrderItemAlreadyExists($db, $orderNumber, $menuItemId['menuItemNumber'])) {
            throw new \Exception("Menu item didn't exist in order.");
        }

        return true;
    }
}
