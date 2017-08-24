<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConstraintRyAnalyticsWish extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ry_analytics_wishes', function (Blueprint $table) {
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("ry_categories_category_group_id", "wish_category")->references("id")->on("ry_categories_categorygroups")->onDelete("cascade");
        	$table->unique(['id', 'ry_categories_category_group_id', 'user_id'], "we_know_you_want_it");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ry_analytics_wishes', function (Blueprint $table) {
        	$table->dropForeign("ry_analytics_wishes_user_id_foreign");
        	$table->dropIndex("ry_analytics_wishes_user_id_foreign");
        	$table->dropForeign("wish_category");
        	$table->dropIndex("wish_category");
        	$table->dropUnique("we_know_you_want_it");
        });
    }
}
