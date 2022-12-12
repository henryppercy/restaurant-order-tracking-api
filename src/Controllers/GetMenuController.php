<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Services\MenuService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class GetMenuController extends Controller
{
    private MenuService $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $data = $this->menuService->getMenu();

        $statusCode = $this->menuService->getStatusCode();

        return $this->respondWithJson($response, $data, $statusCode);
    }

}