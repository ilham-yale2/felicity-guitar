<?php

use Brick\Math\BigInteger;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('product_id');
            $table->longText('description')->nullable()->default('-');
            // general 
            $table->string('condition')->nullable()->default('-');
            $table->double('number_of_strings')->nullable()->default('0');
            $table->string('orientation')->nullable()->default('-');
            $table->string('made_in')->nullable()->default('-');
            $table->double('year')->nullable()->default('0');
            // body
            $table->string('type')->nullable()->default('-');
            $table->string('shape')->nullable()->default('-');
            $table->string('material')->nullable()->default('-');
            $table->string('carve')->nullable()->default('-');
            $table->string('binding')->nullable()->default('-');
            $table->string('weight_relief')->nullable()->default('-');
            $table->string('build_material')->nullable()->default('-');
            $table->string('body_finish_type')->nullable()->default('-');
            $table->string('color')->nullable()->default('-');

            // neck
            $table->string('neck_material')->nullable()->default('-');
            $table->string('truss_rod')->nullable()->default('-');
            $table->string('truss_rod_cover')->nullable()->default('-');
            $table->string('peghead_particular')->nullable()->default('-');
            $table->string('neck_profile')->nullable()->default('-');
            $table->string('fingerboard_material')->nullable()->default('-');
            $table->double('crown_radius')->nullable()->default('0');
            $table->string('scale_length')->nullable()->default('-');
            $table->string('frets')->nullable()->default('-');
            $table->string('nut_size')->nullable()->default('-');
            $table->string('neck_width')->nullable()->default('-');
            $table->string('neck_depth')->nullable()->default('-');
            $table->string('inlays')->nullable()->default('-');
            $table->string('neck_binding')->nullable()->default('-');
            $table->string('side_dots')->nullable()->default('-');
            $table->string('neck_joint')->nullable()->default('-');
            // Hard ware
            $table->string('bridge')->nullable()->default('-');
            $table->string('tailpiece')->nullable()->default('-');
            $table->string('tuning_machines')->nullable()->default('-');
            $table->string('pickup_cover')->nullable()->default('-');
            $table->string('strap_buttons')->nullable()->default('-');
            $table->string('pickguard')->nullable()->default('-');
            $table->string('control_knobs')->nullable()->default('-');
            $table->string('switch')->nullable()->default('-');

            // electronic
            $table->string('bridge_pickup')->nullable()->default('-');
            $table->boolean('middle_pickup')->nullable()->default('0');
            $table->string('neck_pickup')->nullable()->default('-');
            $table->string('active_passive')->nullable()->default('-');
            $table->string('series_pararell')->nullable()->default('-');
            $table->string('control')->nullable()->default('-');
            $table->string('mono_stereo')->nullable()->default('-');
            $table->string('vol_pontentiometer')->nullable()->default('-');
            $table->string('pontentiometer')->nullable()->default('-');
            $table->string('capacitor')->nullable()->default('-');
            $table->string('harnesst')->nullable()->default('-');
            $table->boolean('push_pull')->nullable()->default('0');
            $table->boolean('piezo')->nullable()->default('0');
            $table->boolean('active_eq')->nullable()->default('0');
            $table->boolean('kill_switch')->nullable()->default('0');
            $table->string('output_jack')->nullable()->default('-');
            // MISCELLANEOUS
            $table->string('case')->nullable()->default('-');
            $table->boolean('strap_lock')->nullable()->default('0');
            $table->string('strings')->nullable()->default('-');
            $table->string('tools')->nullable()->default('-');
            $table->string('manual')->nullable()->default('-');
            $table->boolean('coa')->nullable()->default('0');
            $table->boolean('other')->nullable()->default('0');
            $table->string('weight')->nullable()->default('-');
            $table->string('disclosure')->nullable()->default('-');

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
        Schema::dropIfExists('product_details');
    }
}
