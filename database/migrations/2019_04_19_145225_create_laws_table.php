<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('law', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('status', ['decree', 'order', 'ordinance', 'constitution']);
            $table->longText('name');
            $table->longText('top');
            $table->longText('body');
            $table->longText('bottom');
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
        Schema::dropIfExists('law');
    }
}
