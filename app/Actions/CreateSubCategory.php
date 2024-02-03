<?php

namespace App\Actions;

use App\Services\SubCategoryService;

class CreateSubCategory {

    public $subCategoryService;

    public function __construct(SubCategoryService $subCategoryService) {
        $this->subCategoryService = $subCategoryService;
    }

    public function execute($data){
        return $this->subCategoryService->subcategory->create($data);
    }
}