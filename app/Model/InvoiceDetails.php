<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    protected $table = 'invoices_datails';
	protected $primaryKey = 'id';
	public $incrementing = true;
	protected $keyType = 'int';
	public $timestamps = true;
	// protected $dateFormat = 'U';

	function category(){
		return $this->belongsTo(Category::class,'category_id','id');
	}
	function product(){
	   return $this->belongsTo(Product::class,'product_id','id');
	}
	
}
