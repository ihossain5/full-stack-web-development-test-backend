<?php

namespace App\Actions;

use App\Services\DiscountService;

class CreateDiscount {

    public $discountService;

    public function __construct(DiscountService $discountService) {
        $this->discountService = $discountService;
    }

    public function execute($data){
        return $this->discountService->discount->create($data);
    }
}