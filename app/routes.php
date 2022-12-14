<?php

declare(strict_types=1);

use Slim\App;
use App\Controllers\GetMenuController;
use App\Controllers\AddOrderItemController;

return function (App $app) {
    $app->get('/menu', GetMenuController::class);
    $app->post('orders/{orderNumber}', AddOrderItemController::class);
};
