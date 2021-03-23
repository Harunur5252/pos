<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesDatailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices_datails', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id');
            $table->integer('category_id');
            $table->integer('product_id');
            $table->date('date');
            $table->double('selling_qty');
            $table->double('unit_price');
            $table->double('selling_price');
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices_datails');
    }
}
