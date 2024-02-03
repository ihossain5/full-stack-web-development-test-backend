<?php

namespace App\Actions;

use App\Services\ItemService;

class CreateItem {

    public $itemService;

    public function __construct(ItemService $itemService) {
        $this->itemService = $itemService;
    }

    public function execute($data){
        return $this->itemService->item->create($data);
    }
}