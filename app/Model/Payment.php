<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    function customer(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
    function invoice(){
        return $this->belongsTo(Invoice::class,'invoice_id','id');
    }
}
