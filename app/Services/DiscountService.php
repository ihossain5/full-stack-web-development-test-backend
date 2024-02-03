<?php

namespace App\Services;

use App\Models\Discount;

class DiscountService {

    public $discount;

    public function __construct(Discount $discount) {
        $this->discount = $discount;
    }

    public function getAll() {
        return $this->discount->query()
            ->select('id', 'discount_type', 'value', 'discountable_id')
            ->paginate(10);
    }

}