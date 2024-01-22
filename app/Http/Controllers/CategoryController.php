<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categpries = Category::query()->select('id','name')->get();

        return $this->apiSuccessResponse(CategoryResource::collection($categpries));
    }

    public function store(CategoryRequest $request){
        $category = Category::create($request->validated());

        return $this->apiSuccessResponse(new CategoryResource($category));
    }
}
