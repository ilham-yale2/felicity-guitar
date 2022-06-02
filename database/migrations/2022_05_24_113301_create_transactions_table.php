<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('street_address')->nullable();
            $table->string('sub_distric')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->nullable();
            $table->string('postcode')->nullable();
            $table->string('email')->nullable();
            $table->integer('phone')->nullable();
            $table->string('status')->default('pending');
            $table->double('qty')->nullable();
            $table->double('total')->nullable();
            $table->string('shipping_address')->nullable();
            $table->string('shipping_sub_distric')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_province')->nullable();
            $table->string('shipping_country')->nullable();
            $table->double('shipping_postcode')->nullable();
            $table->boolean('receive_email')->default('0');
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
}
