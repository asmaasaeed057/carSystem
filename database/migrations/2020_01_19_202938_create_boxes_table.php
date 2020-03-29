<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boxes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('total');
            $table->integer('reprairCard_id')->unsigned()->nullable();
            $table->foreign('reprairCard_id')->references('id')->on('reprair_cards');
            // $table->string('pay_no')->nullable();
            // $table->date('pay_date')->nullable();
            // $table->string('bankName')->nullable();
            $table->string('tex');
            $table->string('IsDebit');
            // $table->string('PaidUp');
            $table->integer('Admin_id')->unsigned()->nullable();
            $table->foreign('Admin_id')->references('id')->on('admins');
            $table->enum('type', ['Cache', 'Check','Transfer'])->default('Cache');
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
        Schema::dropIfExists('boxes');
    }
}
