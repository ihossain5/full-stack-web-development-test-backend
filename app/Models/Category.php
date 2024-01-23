<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['id','name'];

    public function subcategories(){
        return $this->hasMany(SubCategory::class);
    }

    public function discounts(){
        return $this->hasMany(Discount::class,'discountable_id')->where('discount_type','Category');
    }
}
