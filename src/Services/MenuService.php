<?php

namespace App\Services;

use App\DataAccess\Database;
use App\DataAccess\Hydrators\MenuHydrator;
use App\Entities\MenuItemColl;

class MenuService
{
    /**
     * @var MenuHydrator
     */
    private MenuHydrator $menuHydrator;
    /**
     * @var MenuItemColl
     */
    private MenuItemColl $menuItemColl;
    /**
     * @var int
     */
    private int $statusCode;
    /**
     * @var Database
     */
    private Database $db;

    /**
     * @param MenuHydrator $menuHydrator
     * @param MenuItemColl $menuItemColl
     */
    public function __construct(MenuHydrator $menuHydrator, MenuItemColl $menuItemColl)
    {
        $this->menuHydrator = $menuHydrator;
        $this->menuItemColl = $menuItemColl;
        $this->statusCode = 400;
        $this->db = Database::getInstance();
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
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return array
     */
    public function getMenu(): array
    {
        $responseData = [
            'success' => false,
            'message' => 'Something went wrong.',
            'data' => []
        ];

        try {
            $result = $this->menuHydrator->hydrateMenuFromDb($this->db, $this->menuItemColl);
        }  catch (\PDOException $exception) {
            $responseData['message'] = $exception->getMessage();
            $this->setStatusCode(500);
        }

        if (isset($result) && $result) {
            $responseData = [
                'success' => true,
                'message' => 'Menu successfully retrieved.',
                'data' => $result
            ];
            $this->setStatusCode(200);
        }

        return $responseData;
    }
}
