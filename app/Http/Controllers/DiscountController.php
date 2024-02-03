<?php

namespace App\Http\Controllers;

use App\Actions\CreateDiscount;
use App\Http\Requests\DiscountRequest;
use App\Http\Resources\DiscountResource;
use App\Services\DiscountService;

class DiscountController extends Controller {
    
    public function index(DiscountService $discountService) {
        $discounts = $discountService->getAll();

        return $this->apiSuccessResponse(
            DiscountResource::collection($discounts)
                ->response()
                ->getData(true)
        );
    }

    public function store(DiscountRequest $request, CreateDiscount $action) {
        $discount = $action->execute($request->validated());

        return $this->apiSuccessResponse(new DiscountResource($discount));
    }
}
