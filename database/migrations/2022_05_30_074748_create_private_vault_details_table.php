<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivateVaultDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('private_vault_details', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('product_id');
            $table->longText('general')->nullable();
            $table->longText('body')->nullable();
            $table->longText('neck')->nullable();
            $table->longText('hardware')->nullable();
            $table->longText('electronic')->nullable();
            $table->longText('miscellaneous')->nullable();
            $table->timestamps();

            // general 
            // $table->string('condition')->nullable()->default('-');
            // $table->double('number_of_strings')->nullable()->default('0');
            // $table->string('orientation')->nullable()->default('-');
            // $table->string('made_in')->nullable()->default('-');
            // $table->double('year')->nullable()->default('0');
            // // body
            // $table->string('type')->nullable()->default('-');
            // $table->string('shape')->nullable()->default('-');
            // $table->string('material')->nullable()->default('-');
            // $table->string('carve')->nullable()->default('-');
            // $table->string('binding')->nullable()->default('-');
            // $table->string('weight_relief')->nullable()->default('-');
            // $table->string('build_material')->nullable()->default('-');
            // $table->string('body_finish_type')->nullable()->default('-');
            // $table->string('color')->nullable()->default('-');

            // // neck
            // $table->string('neck_material')->nullable()->default('-');
            // $table->string('truss_rod')->nullable()->default('-');
            // $table->string('truss_rod_cover')->nullable()->default('-');
            // $table->string('peghead_particular')->nullable()->default('-');
            // $table->string('neck_profile')->nullable()->default('-');
            // $table->string('fingerboard_material')->nullable()->default('-');
            // $table->double('crown_radius')->nullable()->default('0');
            // $table->string('scale_length')->nullable()->default('-');
            // $table->string('frets')->nullable()->default('-');
            // $table->string('nut_size')->nullable()->default('-');
            // $table->string('neck_width')->nullable()->default('-');
            // $table->string('neck_depth')->nullable()->default('-');
            // $table->string('inlays')->nullable()->default('-');
            // $table->string('neck_binding')->nullable()->default('-');
            // $table->string('side_dots')->nullable()->default('-');
            // $table->string('neck_joint')->nullable()->default('-');
            // // Hard ware
            // $table->string('bridge')->nullable()->default('-');
            // $table->string('tailpiece')->nullable()->default('-');
            // $table->string('tuning_machines')->nullable()->default('-');
            // $table->string('pickup_cover')->nullable()->default('-');
            // $table->string('strap_buttons')->nullable()->default('-');
            // $table->string('pickguard')->nullable()->default('-');
            // $table->string('control_knobs')->nullable()->default('-');
            // $table->string('switch')->nullable()->default('-');

            // // electronic
            // $table->string('bridge_pickup')->nullable()->default('-');
            // $table->boolean('middle_pickup')->nullable()->default('0');
            // $table->string('neck_pickup')->nullable()->default('-');
            // $table->string('active_passive')->nullable()->default('-');
            // $table->string('series_pararell')->nullable()->default('-');
            // $table->string('control')->nullable()->default('-');
            // $table->string('mono_stereo')->nullable()->default('-');
            // $table->string('vol_pontentiometer')->nullable()->default('-');
            // $table->string('pontentiometer')->nullable()->default('-');
            // $table->string('capacitor')->nullable()->default('-');
            // $table->string('harnesst')->nullable()->default('-');
            // $table->boolean('push_pull')->nullable()->default('0');
            // $table->boolean('piezo')->nullable()->default('0');
            // $table->boolean('active_eq')->nullable()->default('0');
            // $table->boolean('kill_switch')->nullable()->default('0');
            // $table->string('output_jack')->nullable()->default('-');
            // // MISCELLANEOUS
            // $table->string('case')->nullable()->default('-');
            // $table->boolean('strap_lock')->nullable()->default('0');
            // $table->string('strings')->nullable()->default('-');
            // $table->string('tools')->nullable()->default('-');
            // $table->string('manual')->nullable()->default('-');
            // $table->boolean('coa')->nullable()->default('0');
            // $table->boolean('other')->nullable()->default('0');
            // $table->string('weight')->nullable()->default('-');
            // $table->string('disclosure')->nullable()->default('-');

        });

        // Schema::table('private_vault_details', function (Blueprint $table) {
        //     $table->string('weight_product')->after('made_in')->nullable()->default('-');
        //     $table->boolean('limited_series')->after('weight_product')->default('1');
        //     $table->string('limited_series_text')->after('limited_series')->nullable()->default('-');
        //     $table->string('other_text')->after('other')->nullable()->default('-');
        //     $table->string('coa_text')->after('coa')->nullable()->default('-');
        //     $table->string('strap_lock_text')->after('strap_lock')->nullable()->default('-');
        //     $table->string('kill_switch_text')->after('kill_switch')->nullable()->default('-');
        //     $table->string('active_eq_text')->after('active_eq')->nullable()->default('-');
        //     $table->string('piezo_text')->after('piezo')->nullable()->default('-');
        //     $table->string('push_pull_text')->after('push_pull')->nullable()->default('-');
        //     $table->string('middle_pickup_text')->after('middle_pickup')->nullable()->default('-');
            
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('private_vault_details');
    }
}
