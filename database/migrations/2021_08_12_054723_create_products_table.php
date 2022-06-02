<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id');
            // $table->bigInteger('subcategory_id');
            $table->bigInteger('brand_id');
            $table->string('code');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->longText('text');
            $table->string('thumbnail');
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
        Schema::dropIfExists('products');
    }
}
