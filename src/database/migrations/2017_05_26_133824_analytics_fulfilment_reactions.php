<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnalyticsFulfilmentReactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ry_analytics_fulfilment_reactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("fulfilment_id", false, true);
            $table->char("behaviour");
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
        Schema::drop('ry_analytics_fulfilment_reactions');
    }
}
