<?php

namespace App\Entities;

class MenuItem implements \JsonSerializable
{
    private int $id;
    private string $menuItemName;
    private string $menuItemDesc;
    private float $menuItemPrice;
    private string $menuItemImageUrl;
    private string $menuItemImageAlt;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getMenuItemName(): string
    {
        return $this->menuItemName;
    }

    /**
     * @return string
     */
    public function getMenuItemDesc(): string
    {
        return $this->menuItemDesc;
    }

    /**
     * @return float
     */
    public function getMenuItemPrice(): float
    {
        return $this->menuItemPrice;
    }

    /**
     * @return string
     */
    public function getMenuItemImageUrl(): string
    {
        return $this->menuItemImageUrl;
    }

    /**
     * @return string
     */
    public function getMenuItemImageAlt(): string
    {
        return $this->menuItemImageAlt;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getMenuItemName(),
            'description' => $this->getMenuItemDesc(),
            'price' => $this->getMenuItemPrice(),
            'imageURL' => $this->getMenuItemImageUrl(),
            'imageAlt' => $this->getMenuItemImageAlt()
        ];
    }
}
