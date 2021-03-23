<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    function payment(){
        return $this->belongsTo(Payment::class,'id','invoice_id');
    }
    function invoice_details(){
        return $this->hasMany(InvoiceDetails::class,'invoice_id','id');
    }
}
