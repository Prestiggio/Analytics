<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConstraintRyAnalyticsSlug extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ry_analytics_slugs', function (Blueprint $table) {
        	$table->foreign("categorie_id")->references("id")->on("ry_categories_categories")->onDelete("cascade");
        	$table->unique(['linkable_type', 'linkable_id', 'id', 'categorie_id', 'created_at'], "slug_unique");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ry_analytics_slugs', function (Blueprint $table) {
            $table->dropForeign("ry_analytics_slugs_categorie_id_foreign");
            $table->dropIndex("ry_analytics_slugs_categorie_id_foreign");
            $table->dropUnique("slug_unique");
        });
    }
}
