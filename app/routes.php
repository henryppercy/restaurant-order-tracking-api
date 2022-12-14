<?php

declare(strict_types=1);

use Slim\App;
use App\Controllers\GetMenuController;
use Slim\Exception\HttpNotFoundException;
use Psr\Http\Message\ServerRequestInterface as Request;

return function (App $app) {
    $app->get('/menu', GetMenuController::class);

    $app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function (Request $request, $response): HttpNotFoundException {
        throw new HttpNotFoundException($request);
    });
};
