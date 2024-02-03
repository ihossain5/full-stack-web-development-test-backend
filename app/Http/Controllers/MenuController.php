<?php

namespace App\Http\Controllers;

use App\Services\MenuService;

class MenuController extends Controller {
    
    public function index(MenuService $menuService) {
        $menus = $menuService->getMenu();

        return $this->apiSuccessResponse($menus);
    }
}
