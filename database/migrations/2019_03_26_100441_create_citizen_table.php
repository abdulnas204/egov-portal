<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitizenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizen', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('identifier');
            $table->string('password');
            $table->string('auth_token')->default('');
            $table->string('last_name');
            $table->string('first_name');
            $table->date('date_of_birth');
            $table->date('date_joined');
            $table->string('email')->nullable();
            $table->enum('status', ['citizen', 'honorary', 'denounced', 'revoked', 'disappeared', 'government'])->default('citizen');
            $table->boolean('active');
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citizen');
    }
}
