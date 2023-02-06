<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssueClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::dropIfExists('issue_client');
         Schema::create('issue_client', function (Blueprint $table) {       //stworzenie tabeli pivot
             $table->increments('id');
             $table->unsignedBiginteger('client_id')->unsigned();
             $table->unsignedBiginteger('issue_id')->unsigned();
          });
          Schema::table('issue_client', function(Blueprint $table) {        //nadanie kluczy obcych
             $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
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
        Schema::dropIfExists('issue_client');
    }
}
