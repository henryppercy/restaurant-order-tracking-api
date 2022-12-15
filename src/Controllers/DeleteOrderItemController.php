<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Services\OrderItemService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class DeleteOrderItemController extends Controller
{
    private OrderItemService $orderItemService;

    /**
     * @param OrderItemService $orderItemService
     */
    public function __construct(OrderItemService $orderItemService)
    {
        $this->orderItemService = $orderItemService;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return void
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $orderNumber = $args['orderNumber'];

        $menuItemId = $request->getParsedBody();

        $this->orderItemService->setOrderNumber($orderNumber);

        $data = $this->orderItemService->deleteOrderItem($menuItemId);

        $statusCode = $this->orderItemService->getStatusCode();

        return $this->respondWithJson($response, $data, $statusCode);
    }
}
