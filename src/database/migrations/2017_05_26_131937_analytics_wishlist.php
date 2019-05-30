<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnalyticsWishlist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ry_analytics_wishes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger("user_id");
            $table->integer("ry_categories_category_group_id", false, true);
            $table->char("keywords");
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
        Schema::drop('ry_analytics_wishes');
    }
}
