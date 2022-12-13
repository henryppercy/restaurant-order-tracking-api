<?php

declare(strict_types=1);

use Slim\App;
use App\Controllers\GetMenuController;

return function (App $app) {
    $app->get('/menu', GetMenuController::class);
};
