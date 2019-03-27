<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCountryAndGenderToCitizen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citizen', function (Blueprint $table) {
           $table->unsignedBigInteger('country_id')->default(1);
            $table->foreign('country_id')->references('id')->on('country');
            $table->enum('gender', ['M','F'])->default('M');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('citizen', function (Blueprint $table) {
            //
        });
    }
}
