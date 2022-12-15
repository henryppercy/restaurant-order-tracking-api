<?php
namespace App\Services;
use App\DataAccess\DAO\OrderItemDAO;
use App\DataAccess\Database;
use App\Services\Validators\DeleteOrderItemValidator;

class OrderItemService
{
    private Database $db;
    private int $statusCode;
    private int $orderNumber;
    private DeleteOrderItemValidator $deleteOrderItemValidator;
    private OrderItemDAO $orderItemDAO;

    /**
    @param Database $db
    @param OrderNumberValidator $numberValidator
    @param OrderItemIdValidator $orderItemIdValidator
    @param StatusValidator $statusValidator
     */
    public function __construct(OrderItemDAO $orderItemDAO, AddOrderItemValidator $addOrderItemValidator)
    {
        $this->db = Database::getInstance();
        $this->orderItemDAO = $orderItemDAO;
        $this->statusCode = 400;
        $this->deleteOrderItemValidator = $addOrderItemValidator;
    }

    /**
    @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
    @param int $statusCode
     */
    public function setStatusCode(int $statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    /**
    @return int
     */
    public function getOrderNumber(): int
    {
        return $this->orderNumber;
    }

    /**
    @param int $orderNumber
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
            if($this->addOrderItemValidator->validateNewOrderItem($this->db, $this->orderNumber, $orderItemDetails))   {
                $this->orderItemDAO->insertOrderItem($this->db, $this->getOrderNumber(), $orderItemDetails);
                $responseData = [
                    'success' => true,
                    'message' => 'Item successfully added.',
                    'data' => []
                ];
                $this->setStatusCode(200);
            }
        } catch (\Exception $exception) {
            $responseData['message'] = $exception->getMessage();
            $this->setStatusCode(400);
        } catch (\PDOException $exception) {
            $responseData['message'] = $exception->getMessage();
            $this->setStatusCode(500);
        }
        return $responseData;
    }

    public function deleteOrderItem(array $menuItemId): array
    {
        $responseData = [
            'success' => false,
            'message' => 'Something went wrong.',
            'data' => []
        ];

        try {
            if($this->deleteOrderItemValidator->validateOrderItem($this->db, $this->orderNumber, $menuItemId))   {
                $this->orderItemDAO->deleteOrderItem($this->db, $this->getOrderNumber(), $menuItemId);
                $responseData = [
                    'success' => true,
                    'message' => 'Item successfully deleted.',
                    'data' => []
                ];
                $this->setStatusCode(204);
            }
        } catch (\Exception $exception) {
            $responseData['message'] = $exception->getMessage();
            $this->setStatusCode(400);
        } catch (\PDOException $exception) {
            $responseData['message'] = $exception->getMessage();
            $this->setStatusCode(500);
        }
        return $responseData;
    }
}
