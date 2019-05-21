<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdaterequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('updaterequests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('manager_id');
            $table->integer('member_partyID');
            $table->string('member_NID');
            $table->string('member_bloodGroup');
            $table->string('member_currAtoll');
            $table->string('member_currIsland');
            $table->string('member_currAddress');
            $table->integer('member_currAddressID');
            $table->string('member_employedAt');
            $table->string('member_employedAtComments');
            $table->string('member_education');
            $table->string('member_educationComments');
            $table->string('member_email');
            $table->string('member_twitterHandle');
            $table->string('member_FBID');
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
        Schema::dropIfExists('updaterequests');
    }
}
