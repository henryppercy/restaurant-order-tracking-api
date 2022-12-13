<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Services\NewOrderService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AddNewOrderController extends Controller
{
    private NewOrderService $newOrderService;

    /**
     * @param NewOrderService $newOrderService
     */
    public function __construct(NewOrderService $newOrderService)
    {
        $this->newOrderService = $newOrderService;
    }

    /**
     * @throws \Exception
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $orderDetails = $request->getParsedBody();

        $data = $this->newOrderService->postNewOrder($orderDetails);

        $statusCode = $this->newOrderService->getStatusCode();

        $orderNumber = $this->newOrderService->getOrderNumber();

        $body = $response->getBody();

        $body->write($orderNumber);

        return $this->respondWithJson($response, $data, $statusCode);
    }
}