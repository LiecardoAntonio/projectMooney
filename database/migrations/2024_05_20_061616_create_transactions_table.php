<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('customer_id');
            $table->integer('wallet_id');
            $table->integer('transaction_type_id');
            $table->integer('transaction_category_id');
            $table->datetime('date');
            $table->double('amount');


            # Foreign key
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('wallet_id')->references('id')->on('wallets');
            $table->foreign('transaction_type_id')->references('id')->on('transaction_types');
            $table->foreign('transaction_category_id')->references('id')->on('transaction_categories');

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
        Schema::dropIfExists('transactions');
    }
};
