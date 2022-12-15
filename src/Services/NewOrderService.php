<?php

namespace App\Services;

use App\DataAccess\DAO\NewOrderDAO;
use App\DataAccess\Database;
use App\Entities\NewOrder;
use App\Services\Validators\EmailValidator;
use App\Services\Sanitisers\NewOrderSanitiser;

class NewOrderService
{
    /**
     * @var NewOrderDAO
     */
    private NewOrderDAO $newOrderDAO;

    /**
     * @var NewOrder
     */
    private NewOrder $newOrder;

    /**
     * @var int
     */
    private int $statusCode;

    /**
     * @var Database
     */
    private Database $db;

    /**
     *
     * @param NewOrder $newOrder
     */
    public function __construct(NewOrderDAO $newOrderDAO, NewOrder $newOrder)
    {
        $this->newOrderDAO = $newOrderDAO;
        $this->newOrder = $newOrder;
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
    public function postNewOrder($orderDetails): array
    {
        $responseData = [
            'success' => false,
            'message' => 'Something went wrong.',
            'data' => []
        ];

        try {
            $orderDetails = NewOrderSanitiser::sanitise($orderDetails);

            if(EmailValidator::validateEmail($orderDetails['customerEmail'])) {
                $this->newOrderDAO->postNewOrderToDb($this->db, $orderDetails);
                $result = $this->newOrderDAO->getNewOrderNumber($this->db, $this->newOrder);
            }

        }  catch (\PDOException $exception) {
            $responseData['message'] = $exception->getMessage();
            $this->setStatusCode(500);
        }

        if (isset($result) && $result) {
            $responseData = [
                'success' => true,
                'message' => 'Successfully created new order.',
                'data' => $result
            ];
            $this->setStatusCode(200);
        }

        return $responseData;
    }
}