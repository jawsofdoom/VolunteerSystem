<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVolunteerCenterRelationshipToOpportunities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opportunities', function (Blueprint $table) {
            $table->integer('volunteer_center_id')->unsigned();
            $table->foreign('volunteer_center_id')->references('id')->on('volunteer_centers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('opportunities', function (Blueprint $table) {
            $table->dropForeign(['volunteer_center_id']);
            $table->dropColumn(['volunteer_center_id']);
        });
    }
}
