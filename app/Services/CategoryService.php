<?php

namespace App\Services;

use App\Models\Category;

class CategoryService {

    public $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function getAll() {
        return $this->category->query()->select('id', 'name')->paginate(10);
    }

}