<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// for users authentication route
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function(){
   return view('auth.adminlogin');
});

Route::group(['middleware'=>'CheckAuth'],function(){
   
      // for manageusers routes
      Route::prefix('users')->group(function(){
         Route::get('/view',        'Backend\UserController@view')->name('users.view');
         Route::get('/add',         'Backend\UserController@add')->name('users.add');
         Route::post('/store',      'Backend\UserController@store')->name('users.store');
         Route::get('/edit/{id}',   'Backend\UserController@edit')->name('users.edit');
         Route::post('/update',     'Backend\UserController@update')->name('users.update');
         Route::get('/delete/{id}', 'Backend\UserController@delete')->name('users.delete');
      });

      // for users profile routes
      Route::prefix('profiles')->group(function(){
         Route::get('/view',           'Backend\ProfileController@view')->name('profiles.view');
         Route::get('/edit',           'Backend\ProfileController@edit')->name('profiles.edit');
         Route::post('/update',        'Backend\ProfileController@update')->name('profiles.update');
         Route::get('/passwod/view',   'Backend\ProfileController@passwordView')->name('profiles.passwordView');
         Route::post('/passwod/update', 'Backend\ProfileController@passwordUpdate')->name('profiles.passwordUpdate');
      });

      // for suplier routes
      Route::prefix('suppliers')->group(function(){
      Route::get('/view',        'Backend\SupplierController@view')->name('suppliers.view');
      Route::get('/add',         'Backend\SupplierController@add')->name('suppliers.add');
      Route::post('/store',      'Backend\SupplierController@store')->name('suppliers.store');
      Route::get('/edit/{id}',   'Backend\SupplierController@edit')->name('suppliers.edit');
      Route::post('/update',     'Backend\SupplierController@update')->name('suppliers.update');
      Route::get('/delete/{id}', 'Backend\SupplierController@delete')->name('suppliers.delete');
   });

    // for customer routes
    Route::prefix('customers')->group(function(){
      Route::get('/view',        'Backend\CustomerController@view')->name('customers.view');
      Route::get('/add',         'Backend\CustomerController@add')->name('customers.add');
      Route::post('/store',      'Backend\CustomerController@store')->name('customers.store');
      Route::get('/edit/{id}',   'Backend\CustomerController@edit')->name('customers.edit');
      Route::post('/update',     'Backend\CustomerController@update')->name('customers.update');
      Route::get('/delete/{id}', 'Backend\CustomerController@delete')->name('customers.delete');
      Route::get('/credit',      'Backend\CustomerController@creditCustomer')->name('customers.credit');
      Route::get('/credit/pdf',      'Backend\CustomerController@creditCustomerPdf')->name('customers.credit.pdf');
      Route::get('/edit/invoice/{invoice_id}',      'Backend\CustomerController@editInvoice')->name('edit.invoice');
      Route::post('/update/invoice/{invoice_id}',      'Backend\CustomerController@updateInvoice')->name('update.invoice');
      Route::get('/invoice/details/pdf/{invoice_id}',      'Backend\CustomerController@customerInvoiceDetailsPdf')->name('invoice.details.pdf');
      Route::get('/invoice/paid',         'Backend\CustomerController@customerPaid')->name('customers.paid');
      Route::get('/invoice/paid/pdf',         'Backend\CustomerController@customerPaidPdf')->name('customers.paid.pdf');
      Route::get('/wise/single/report',         'Backend\CustomerController@customerSingleReport')->name('customers.wise.report');
      Route::get('/wise/credit/pdf',         'Backend\CustomerController@customerWiseCreditPdf')->name('customer.wise.credit.pdf');
      Route::get('/wise/paid/pdf',         'Backend\CustomerController@customerWisePaidPdf')->name('customer.wise.paid.pdf');
   });

   // for unit routes
   Route::prefix('units')->group(function(){
      Route::get('/view',        'Backend\UnitController@view')->name('units.view');
      Route::get('/add',         'Backend\UnitController@add')->name('units.add');
      Route::post('/store',      'Backend\UnitController@store')->name('units.store');
      Route::get('/edit/{id}',   'Backend\UnitController@edit')->name('units.edit');
      Route::post('/update',     'Backend\UnitController@update')->name('units.update');
      Route::get('/delete/{id}', 'Backend\UnitController@delete')->name('units.delete');
   });

    // for category routes
    Route::prefix('categories')->group(function(){
      Route::get('/view',        'Backend\CategoryController@view')->name('categories.view');
      Route::get('/add',         'Backend\CategoryController@add')->name('categories.add');
      Route::post('/store',      'Backend\CategoryController@store')->name('categories.store');
      Route::get('/edit/{id}',   'Backend\CategoryController@edit')->name('categories.edit');
      Route::post('/update',     'Backend\CategoryController@update')->name('categories.update');
      Route::get('/delete/{id}', 'Backend\CategoryController@delete')->name('categories.delete');
   });

   // for product routes
   Route::prefix('products')->group(function(){
      Route::get('/view',        'Backend\ProductController@view')->name('products.view');
      Route::get('/add',         'Backend\ProductController@add')->name('products.add');
      Route::post('/store',      'Backend\ProductController@store')->name('products.store');
      Route::get('/edit/{id}',   'Backend\ProductController@edit')->name('products.edit');
      Route::post('/update',     'Backend\ProductController@update')->name('products.update');
      Route::get('/delete/{id}', 'Backend\ProductController@delete')->name('products.delete');
   });

   // for purchase routes
   Route::prefix('purchases')->group(function(){
      Route::get('/view',         'Backend\PurchaseController@view')->name('purchases.view');
      Route::get('/add',          'Backend\PurchaseController@add')->name('purchases.add');
      Route::post('/store',       'Backend\PurchaseController@store')->name('purchases.store');
      Route::get('/pending',      'Backend\PurchaseController@pending')->name('purchases.pending');
      Route::get('/approve/{id}', 'Backend\PurchaseController@approve')->name('purchases.approve');
      Route::get('/delete/{id}',  'Backend\PurchaseController@delete')->name('purchases.delete');
      Route::get('/report',      'Backend\PurchaseController@purchaseReport')->name('purchases.report');
      Route::get('/report/pdf',      'Backend\PurchaseController@purchaseReportPdf')->name('daily.purchase.pdf');
   });

   // default route by ajax calling
   Route::get('/get-category/{supplier_id}',         'Backend\DafaultController@getCategory')->name('get-category');
   Route::get('/get-product/{category_id}',          'Backend\DafaultController@getProduct')->name('get-product');
   Route::get('/check-product-stock/{product_id}',   'Backend\DafaultController@getProductStck')->name('check-product-stock');

   // for invoice routes
   Route::prefix('invoices')->group(function(){
      Route::get('/view',               'Backend\InvoiceController@view')->name('invoices.view');
      Route::get('/add',                'Backend\InvoiceController@add')->name('invoices.add');
      Route::post('/store',             'Backend\InvoiceController@store')->name('invoices.store');
      Route::get('/pending',            'Backend\InvoiceController@pending')->name('invoices.pending');
      Route::get('/approve/{id}',       'Backend\InvoiceController@approve')->name('invoices.approve');
      Route::get('/delete/{id}',        'Backend\InvoiceController@delete')->name('invoices.delete');
      Route::post('/approve/store/{id}','Backend\InvoiceController@approveStore')->name('approve.store');
      Route::get('/print/list',         'Backend\InvoiceController@invoicePrintList')->name('invoices.print.list');
      Route::get('/print/{id}',         'Backend\InvoiceController@invoicePrint')->name('invoices.print');
      Route::get('/daily/report',       'Backend\InvoiceController@dailyReport')->name('invoices.daily.report');
      Route::get('/daily/invoice/pdf',  'Backend\InvoiceController@dailyInvoicePdf')->name('daily.invoice.pdf');
   });

   // for stock routes
   Route::prefix('stocks')->group(function(){
      Route::get('/report',                             'Backend\StockController@stockReport')->name('stocks.report');
      Route::get('/report/pdf',                         'Backend\StockController@stockReportPdf')->name('products.report.pdf');
      Route::get('/report/supplier/product/wise',       'Backend\StockController@stockSupplierProductWiseReport')->name('stocks.supplier.product.wise.report');
      Route::get('/report/supplier/wise/pdf',           'Backend\StockController@stockSupplierWiseReportPdf')->name('stocks.supplier.wise.report.pdf');
      Route::get('/report/product/wise/pdf',            'Backend\StockController@stockProductWiseReportPdf')->name('stocks.product.wise.report.pdf');
     });
});


