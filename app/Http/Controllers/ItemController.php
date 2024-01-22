<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(){
        $items = Item::query()->select('id','name','sub_category_id')->with('subcategory:id,name')->get();

        return $this->apiSuccessResponse(ItemResource::collection($items));
    }

    public function store(ItemRequest $request){
        $item = Item::create($request->validated());

        return $this->apiSuccessResponse(new ItemResource($item));
    }
}
