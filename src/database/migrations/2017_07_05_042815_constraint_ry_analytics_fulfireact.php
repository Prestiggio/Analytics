<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConstraintRyAnalyticsFulfireact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ry_analytics_fulfilment_reactions', function (Blueprint $table) {
            $table->foreign("fulfilment_id")->references("id")->on("ry_analytics_fulfilments")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ry_analytics_fulfilment_reactions', function (Blueprint $table) {
        	$table->dropForeign("ry_analytics_fulfilment_reactions_fulfilment_id_foreign");
        });
    }
}
