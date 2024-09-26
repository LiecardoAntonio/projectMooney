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
        Schema::create('user_wallets', function (Blueprint $table) {
            $table->integer('customer_id');
            $table->integer('wallet_id');
            $table->integer('role_id');

            # Foreign key
            $table->foreign('customer_id') -> references('id')->on('customers');
            $table->foreign('wallet_id') -> references('id')->on('wallets');
            $table->foreign('role_id') -> references('id')->on('roles');


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
        Schema::dropIfExists('user_wallets');
    }
};
