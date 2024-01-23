<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['id','name','category_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function discounts(){
        return $this->hasMany(Discount::class,'discountable_id')->where('discount_type','SubCategory');
    }

    public function items(){
        return $this->hasMany(Item::class);
    }
}
