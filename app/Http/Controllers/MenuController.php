<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;

class MenuController extends Controller {
    public function index() {
        $categories = Category::with(['discounts', 'subcategories.discounts', 'subcategories.items.discounts'])
            ->select('id', 'name')
            ->get();

        $categories = $categories->map(function ($category) {
            $subcategories = $category->subcategories->map(function ($subcategory) {
                $items = $subcategory->items->map(function ($item) {
                    if ($item->discounts->isNotEmpty()) {
                        $discount = $item->discounts->first()->value;
                    } elseif ($item->subCategory->discounts->isNotEmpty()) {
                        $discount = $item->subCategory->discounts->first()->value;
                    } else {
                        $discount = $item->subCategory->category->discounts->first()->value ?? null;
                    }

                    return [
                        'id'       => $item->id,
                        'name'     => $item->name,
                        'discount' => $discount,
                    ];
                });

                if ($subcategory->discounts->isNotEmpty()) {
                    $discount = $subcategory->discounts->first()->value;
                } else {
                    $discount = $subcategory->category->discounts->first()->value ?? null;
                }

                return [
                    'id'       => $subcategory->id,
                    'name'     => $subcategory->name,
                    'discount' => $discount,
                    'items'    => $items,
                ];
            });

            if ($category->discounts->isNotEmpty()) {
                $discount = $category->discounts->first()->value;
            } else {
                $discount = null;
            }

            return [
                'id'            => $category->id,
                'name'          => $category->name,
                'discount'      => $discount,
                'subcategories' => $subcategories,
            ];
        });
        return $this->apiSuccessResponse($categories);
    }
}
