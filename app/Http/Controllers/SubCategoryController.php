<?php

namespace App\Http\Controllers;

use App\Actions\CreateSubCategory;
use App\Http\Requests\SubCategoryRequest;
use App\Http\Resources\SubCategoryResource;
use App\Services\SubCategoryService;

class SubCategoryController extends Controller {
    
    public function index(SubCategoryService $subCategoryService) {
        $subcategpries = $subCategoryService->getAll();

        return $this->apiSuccessResponse(
            SubCategoryResource::collection($subcategpries)
                ->response()
                ->getData(true)
        );
    }

    public function store(SubCategoryRequest $request, CreateSubCategory $action) {
        $subcategory = $action->execute($request->validated());

        return $this->apiSuccessResponse(new SubCategoryResource($subcategory));
    }
}
