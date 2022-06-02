<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnDescriptionToProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_details', function (Blueprint $table) {
            $table->string('weight_product')->after('made_in')->nullable()->default('-');
            $table->boolean('limited_series')->after('weight_product')->default('1');
            $table->string('limited_series_text')->after('limited_series')->nullable()->default('-');
            $table->string('other_text')->after('other')->nullable()->default('-');
            $table->string('coa_text')->after('coa')->nullable()->default('-');
            $table->string('strap_lock_text')->after('strap_lock')->nullable()->default('-');
            $table->string('kill_switch_text')->after('kill_switch')->nullable()->default('-');
            $table->string('active_eq_text')->after('active_eq')->nullable()->default('-');
            $table->string('piezo_text')->after('piezo')->nullable()->default('-');
            $table->string('push_pull_text')->after('push_pull')->nullable()->default('-');
            $table->string('middle_pickup_text')->after('middle_pickup')->nullable()->default('-');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_details', function (Blueprint $table) {
            //
        });
    }
}
