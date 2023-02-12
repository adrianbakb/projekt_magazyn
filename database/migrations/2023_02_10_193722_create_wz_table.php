<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWzTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wz', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('product_id')->unsigned();
            $table->unsignedBiginteger('issue_id')->unsigned();
            $table->unsignedBiginteger('client_id')->unsigned();
            $table->string('number');
            $table->string('WZ_date');
            $table->timestamps();
        });
        Schema::table('wz', function(Blueprint $table) {        //nadanie kluczy obcych
           $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
           $table->foreign('issue_id')->references('id')->on('issues')->onDelete('cascade');
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
        Schema::dropIfExists('wz');
    }
}
