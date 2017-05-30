<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnalyticsFulfilmentsProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ry_analytics_fulfilments', function (Blueprint $table) {
            $table->char("fulfil_type")->after("wish_id");
            $table->integer("fulfil_id")->after("fulfil_type");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ry_analytics_fulfilments', function (Blueprint $table) {
            //
        });
    }
}
