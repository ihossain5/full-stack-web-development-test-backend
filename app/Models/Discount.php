<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = ['id','discount_type','value','discountable_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'discountable_id');
    }
    
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'discountable_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'discountable_id');
    }

    public function getDiscountableNameAttribute()
    {
        switch ($this->discount_type) {
            case 'Category':
                return optional($this->category)->name;
            case 'SubCategory':
                return optional($this->subcategory)->name;
            case 'Item'::class:
                return optional($this->item)->name;
            default:
                return null;
        }
    }

}   
