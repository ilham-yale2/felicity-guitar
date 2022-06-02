<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('phone')->nullable();
            $table->text('whatsapp_template')->nullable();
            $table->text('image')->nullable();
            $table->text('location')->nullable();
            $table->text('map')->nullable();
            $table->text('shopee')->nullable();
            $table->text('tokopedia')->nullable();
            $table->string('facebook')->nullable();
            $table->text('facebook_link')->nullable();
            $table->string('instagram')->nullable();
            $table->text('instagram_link')->nullable();
            $table->string('youtube')->nullable();
            $table->text('youtube_link')->nullable();
            $table->string('email')->nullable();
            $table->text('seo_keyword')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
