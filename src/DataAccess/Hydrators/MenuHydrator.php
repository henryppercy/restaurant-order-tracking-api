<?php

namespace App\DataAccess\Hydrators;

use App\DataAccess\Database;
use App\Entities\MenuItem;
use App\Entities\MenuItemColl;

class MenuHydrator
{
    /**
     * @param Database $db
     * @param MenuItemColl $menuItemColl
     * @return MenuItemColl
     */
    public function hydrateMenuFromDb(Database $db, MenuItemColl $menuItemColl): MenuItemColl
    {
        $sql = 'SELECT 
                    `id`, 
                    `menu_item_name` as `menuItemName`, 
                    `menu_item_desc` as `menuItemDesc`,
                    `menu_item_price` as `menuItemPrice`,
                    `menu_item_image` as `menuItemImageUrl`, 
                    `image_alt` as `menuItemImageAlt` 
                FROM `menu_items`;';

        $pdo = $db->getConnection()->prepare($sql);
        $pdo->execute();
        $pdo->setFetchMode(\PDO::FETCH_CLASS, MenuItem::class);

        $result = $pdo->fetchAll();

        $menuItemColl->setMenuItemColl($result);
        return $menuItemColl;
    }
}
