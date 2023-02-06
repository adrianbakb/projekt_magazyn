<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::dropIfExists('orders_client');
         Schema::create('orders_client', function (Blueprint $table) {       //stworzenie tabeli pivot
             $table->increments('id');
             $table->unsignedBiginteger('client_id')->unsigned();
             $table->unsignedBiginteger('order_id')->unsigned();
          });
          Schema::table('orders_client', function(Blueprint $table) {        //nadanie kluczy obcych
             $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
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
        Schema::dropIfExists('orders_client');
    }
}
