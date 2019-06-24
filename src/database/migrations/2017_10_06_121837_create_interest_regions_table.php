<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterestRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ry_appeldoffres_interest_regions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("societe_id", false, true);
            $table->integer("region_id", false, true);
            $table->timestamps();
            
            $table->foreign("societe_id")->references("id")->on("ry_cart_societes")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ry_appeldoffres_interest_regions');
    }
}
