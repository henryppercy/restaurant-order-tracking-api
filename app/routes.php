<?php

declare(strict_types=1);

use Slim\App;
use App\Controllers\GetMenuController;
use App\Controllers\AddOrderItemController;
use App\Controllers\AddNewOrderController;
use Slim\Exception\HttpNotFoundException;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

return function (App $app) {
    $app->options('/{routes:.+}', function (Request $request, Response $response, $args): Response
    {
        return $response;
    });

    $app->add(function (Request $request, RequestHandler $handler): Response
    {
        $response = $handler->handle($request);
        return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    });

    $app->get('/menu', GetMenuController::class);
    $app->post('/orders', AddNewOrderController::class);
    $app->post('/additems/{orderNumber}', AddOrderItemController::class);

    $app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function (Request $request, $response): HttpNotFoundException {
        throw new HttpNotFoundException($request);
    });
};
