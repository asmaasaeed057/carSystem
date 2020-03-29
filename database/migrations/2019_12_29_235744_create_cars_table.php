<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('model');

            $table->string('platNo');

            $table->integer('carType_id')->unsigned()->nullable();
            $table->foreign('carType_id')->references('id')->on('car_types');

            $table->integer('carCatogaries_id')->unsigned()->nullable();
            $table->foreign('carCatogaries_id')->references('id')->on('car_catograys');


            $table->integer('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients');


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
        Schema::dropIfExists('cars');
    }
}
