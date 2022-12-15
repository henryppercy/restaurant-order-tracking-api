<?php

namespace App\Entities;

class NewOrder implements \JsonSerializable
{
    private int $orderNumberId;

    /**
     * @return int
     */
    public function getOrderNumberId(): int
    {
        return $this->orderNumberId;
    }

    /**
     * @param int $orderNumberId
     */
    public function setOrderNumberId(int $orderNumberId): void
    {
        $this->orderNumberId = $orderNumberId;
    }

    public function jsonSerialize(): array
    {
        return [
            "orderNumber" => $this->getOrderNumberId()
        ];
    }
}