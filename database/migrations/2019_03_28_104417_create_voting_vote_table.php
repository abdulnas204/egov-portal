<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotingVoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voting_vote', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('voting_id');
            $table->foreign('voting_id')->references('id')->on('voting');
            $table->unsignedBigInteger('voting_option_id');
            $table->foreign('voting_option_id')->references('id')->on('voting_option');
            $table->unsignedInteger('citizen_id');
            $table->foreign('citizen_id')->references('id')->on('citizen');
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
        Schema::dropIfExists('voting_vote');
    }
}
