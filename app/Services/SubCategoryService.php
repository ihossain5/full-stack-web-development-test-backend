<?php

namespace App\Services;

use App\Models\SubCategory;

class SubCategoryService {

    public $subcategory;

    public function __construct(SubCategory $subcategory) {
        $this->subcategory = $subcategory;
    }

    public function getAll() {
        return $this->subcategory
        ->query()
        ->select('id','name','category_id')
        ->paginate(10);
    }

}