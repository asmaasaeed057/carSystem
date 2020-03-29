<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ItemName');
            $table->integer('qty')->default(1);
            $table->float('price');
            $table->float('subTotal')->nullable();
            $table->float('tax');
            $table->float('total');

            $table->integer('car_id')->unsigned()->nullable();
            $table->foreign('car_id')->references('id')->on('cars');


            $table->integer('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients');


            $table->integer('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins');

            $table->float('paidAmount')->nullable();
            $table->float('isDebet')->nullable();
            $table->enum('status', ['panding', 'accepted','finished' ,'underMaintance'])->default('panding');

            $table->integer('reprairCard_id')->unsigned()->nullable();
            $table->foreign('reprairCard_id')->references('id')->on('reprair_cards');

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
        Schema::dropIfExists('accounts');
    }
}
