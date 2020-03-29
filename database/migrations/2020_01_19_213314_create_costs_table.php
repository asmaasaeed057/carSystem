<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('amount');
            $table->string('pay_no')->nullable(); 
            $table->date('pay_date')->nullable();
            $table->string('bankName')->nullable();
            $table->string('cardHolder')->nullable();
            $table->text('note')->nullable();
            $table->integer('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->enum('paymentType', ['cash', 'cheque','transfer'])->default('cash');
            $table->enum('type', ['cost', 'receipt','salary','others'])->default('cost');
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
        Schema::dropIfExists('costs');
    }
}
