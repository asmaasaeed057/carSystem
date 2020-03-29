<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt_vouchers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('amount');
            $table->string('pay_no')->nullable();
            $table->date('pay_date')->nullable();
            $table->string('bankName')->nullable();
            $table->integer('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->integer('reprairCard_id')->unsigned()->nullable();
            $table->foreign('reprairCard_id')->references('id')->on('reprair_cards');
            $table->enum('paymentType', ['cash', 'cheque','transfer'])->default('cash');
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
        Schema::dropIfExists('receipt_vouchers');
    }
}
