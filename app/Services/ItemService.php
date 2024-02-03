<?php

namespace App\Services;

use App\Models\Item;

class ItemService {

    public $item;

    public function __construct(Item $item) {
        $this->item = $item;
    }

    public function getAll() {
        return $this->item
            ->query()
            ->select('id', 'name', 'sub_category_id')
            ->with('subcategory:id,name')
            ->paginate(10);
    }

}