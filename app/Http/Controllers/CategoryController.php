<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categpries = Category::query()->select('id','name')->get();
        
        return $this->apiSuccessResponse($categpries);
    }

    public function store(Request $request){}
}
