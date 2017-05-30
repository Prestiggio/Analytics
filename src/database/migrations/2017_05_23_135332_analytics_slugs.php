<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnalyticsSlugs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ry_analytics_slugs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("categorie_id", false, true)->nullable();
            $table->text("slug");
            $table->char("linkable_type");
            $table->integer("linkable_id", false, true);
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
        Schema::drop('ry_analytics_slugs');
    }
}
