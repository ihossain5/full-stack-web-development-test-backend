<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCategoryRequest;
use App\Http\Resources\SubCategoryResource;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){
        $subcategpries = SubCategory::query()->select('id','name','category_id')->with('category:id,name')->get();

        return $this->apiSuccessResponse(SubCategoryResource::collection($subcategpries));
    }

    public function store(SubCategoryRequest $request){
        $subcategory = SubCategory::create($request->validated());

        return $this->apiSuccessResponse(new SubCategoryResource($subcategory));
    }
}
