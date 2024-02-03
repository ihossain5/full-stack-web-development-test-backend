<?php

namespace App\Http\Controllers;

use App\Actions\CreateItem;
use App\Http\Requests\ItemRequest;
use App\Http\Resources\ItemResource;
use App\Services\ItemService;

class ItemController extends Controller {
    
    public function index(ItemService $itemService) {
        $items = $itemService->getAll();

        return $this->apiSuccessResponse(
            ItemResource::collection($items)
                ->response()
                ->getData(true)
        );
    }

    public function store(ItemRequest $request, CreateItem $action) {
        $item = $action->execute($request->validated());

        return $this->apiSuccessResponse(new ItemResource($item));
    }
}
