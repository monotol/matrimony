<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name');
            $table->date('date_of_birth');
            $table->integer('age'); 
            $table->enum('gender', ['male','female']);
            $table->string('ethnicity');
            $table->string('nationality');
            $table->string('country_of_origin');
            $table->string('city_of_residence'); 
            $table->string('country_of_residence'); 
            $table->integer('number_of_children'); 
            $table->integer('number_of_dependent_children'); 
            $table->string('marital_status');    
            $table->integer('number_of_wives');
            $table->string('education');
            $table->string('employment');
            $table->string('height');
            $table->boolean('revert');
            $table->date('reversion_date');
            $table->boolean('own_accomodation');
            $table->boolean('own_transport');
            $table->string('transport_type'); 
            $table->boolean('disabled');
            $table->string('disability');
            $table->text('more_info'); 
            $table->boolean('polygamous');
            $table->boolean('waliyy_wakeel');
            $table->string('waliyy_wakeel_relationship'); 
            $table->string('waliyy_wakeel_phone');
            $table->string('username'); 
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
