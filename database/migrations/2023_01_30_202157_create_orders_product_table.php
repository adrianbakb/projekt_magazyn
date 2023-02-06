<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::dropIfExists('orders_product');
         Schema::create('orders_product', function (Blueprint $table) {       //stworzenie tabeli pivot
             $table->increments('id');
             $table->unsignedBiginteger('product_id')->unsigned();
             $table->unsignedBiginteger('order_id')->unsigned();
          });
          Schema::table('orders_product', function(Blueprint $table) {        //nadanie kluczy obcych
             $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
             $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
          });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_product');
    }
}
