<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssueProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::dropIfExists('issue_product');
         Schema::create('issue_product', function (Blueprint $table) {       //stworzenie tabeli pivot
             $table->increments('id');
             $table->unsignedBiginteger('product_id')->unsigned();
             $table->unsignedBiginteger('issue_id')->unsigned();
          });
          Schema::table('issue_product', function(Blueprint $table) {        //nadanie kluczy obcych
             $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
             $table->foreign('issue_id')->references('id')->on('issues')->onDelete('cascade');
          });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issue_product');
    }
}
