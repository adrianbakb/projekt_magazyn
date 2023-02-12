<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePzTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pz', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('product_id')->unsigned();
            $table->unsignedBiginteger('order_id')->unsigned();
            $table->unsignedBiginteger('client_id')->unsigned();
            $table->string('number');
            $table->string('PZ_date');
            $table->timestamps();
        });
        Schema::table('pz', function(Blueprint $table) {        //nadanie kluczy obcych
           $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
           $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
           $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pz');
    }
}
