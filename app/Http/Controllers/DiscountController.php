<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiscountRequest;
use App\Http\Resources\DiscountResource;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index(){
        $discounts = Discount::query()->select('id','discount_type','value','discountable_id')->get();

        return $this->apiSuccessResponse(DiscountResource::collection($discounts));
    }

    public function store(DiscountRequest $request){
        $discount = Discount::create($request->validated());

        return $this->apiSuccessResponse(new DiscountResource($discount));
    }
}
