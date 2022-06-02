<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_trades', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->integer('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('piece_of_gear')->nullable();
            $table->string('gear_type')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('condition')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('case_include')->nullable();
            $table->longText('description_problem')->nullable();
            $table->longText('description_modification')->nullable();
            $table->longText('information')->nullable();
            $table->longText('url')->nullable();
            $table->text('images')->nullable();
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
        Schema::dropIfExists('user_trades');
    }
}
