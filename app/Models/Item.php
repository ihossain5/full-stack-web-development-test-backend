<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    
    protected $fillable = ['id','name','sub_category_id'];

    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }
}
