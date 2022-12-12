<?php

namespace App\Entities;

use JsonSerializable;

class MenuItemColl implements JsonSerializable
{
    private array $menuItemColl;

    /**
     * @return array
     */
    public function getMenuItemColl(): array
    {
        return $this->menuItemColl;
    }

    /**
     * @param array $menuItemColl
     */
    public function setMenuItemColl(array $menuItemColl): void
    {
        foreach ($menuItemColl as $menuItem) {
            $this->menuItemColl[] = $menuItem;
        }
    }


    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->getMenuItemColl();
    }
}