<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivateVaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('private_vaults', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id');
            $table->bigInteger('brand_id');
            $table->string('code');
            $table->string('name')->nullable();
            $table->string('name_2')->nullable();
            $table->string('slug')->nullable();
            $table->longText('text');
            $table->longText('description')->default('-')->nullable();
            $table->string('status')->nullable();
            $table->string('thumbnail');
            $table->string('thumbnail_2');
            $table->string('meta_text');
            $table->double('price');
            $table->double('discount');
            $table->double('sell_price');
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
        Schema::dropIfExists('private_vaults');
    }
}
