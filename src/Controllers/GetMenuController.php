<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Services\MenuService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class GetMenuController extends Controller
{
    /**
     * @var MenuService
     */
    private MenuService $menuService;

    /**
     * @param MenuService $menuService
     */
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * @throws \Exception
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $data = $this->menuService->getMenu();

        $statusCode = $this->menuService->getStatusCode();

        return $this->respondWithJson($response, $data, $statusCode);
    }
}
