<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id','id');
     }
     function unit(){
         return $this->belongsTo(Unit::class,'unit_id','id');
     }
     function category(){
         return $this->belongsTo(Category::class,'category_id','id');
     }
     function product(){
        return $this->belongsTo(Product::class,'product_id','id');
     }
}
