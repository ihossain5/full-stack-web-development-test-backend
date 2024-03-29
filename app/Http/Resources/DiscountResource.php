<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscountResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        return [
            'id'                => $this->id,
            'discount_type'     => $this->discount_type,
            'value'             => $this->value,
            'discountable_name' => $this->getDiscountableNameAttribute(),
        ];
    }
}
