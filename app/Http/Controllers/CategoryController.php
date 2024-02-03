<?php

namespace App\Http\Controllers;

use App\Actions\CreateCategory;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;

class CategoryController extends Controller {
    
    public function index(CategoryService $categoryService) {
        $categories = $categoryService->getAll();

        return $this->apiSuccessResponse(
            CategoryResource::collection($categories)
            ->response()
            ->getData(true)
        );
    }

    public function store(CategoryRequest $request, CreateCategory $action) {
        $category = $action->execute($request->validated());

        return $this->apiSuccessResponse(new CategoryResource($category));
    }
}
