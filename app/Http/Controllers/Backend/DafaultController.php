<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Unit;
use Illuminate\Http\Request;


class DafaultController extends Controller
{
    function getCategory(Request $request,$supplier_id){
        $supplier_id = $supplier_id;
        $allCategory = Product::with(['category'])->select('category_id')->where('supplier_id',$supplier_id)->groupBy('category_id')->get();
        return json_encode($allCategory);
    }

    function getProduct(Request $request,$category_id){
        $category_id = $category_id;
        $allProduct  = Product::where('category_id',$category_id)->get();
        return json_encode($allProduct);
    }
    function getProductStck(Request $request,$product_id){
        $product_id    = $product_id;
        $productStock  = Product::where('id',$product_id)->first()->quantity;
        return json_encode($productStock);
    }
}
