<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductMagazineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::dropIfExists('product_magazine');
         Schema::create('product_magazine', function (Blueprint $table) {
             $table->increments('id');
             $table->unsignedBiginteger('magazine_id')->unsigned();
             $table->unsignedBiginteger('product_id')->unsigned();

             $table->foreign('magazine_id')->references('id')->on('magazines')->onDelete('cascade');
             $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

         });
     }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_magazine');
    }
}
