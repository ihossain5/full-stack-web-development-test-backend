<?php

namespace App\Actions;

use App\Services\CategoryService;

class CreateCategory {

    public $categoryService;

    public function __construct(CategoryService $categoryService) {
        $this->categoryService = $categoryService;
    }

    public function execute($data){
        return $this->categoryService->category->create($data);
    }
}