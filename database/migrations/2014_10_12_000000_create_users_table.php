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
            $table->string('middle_name')->nullable(); //a person may not have a middle name
            $table->date('date_of_birth');
            //$table->integer('age'); 
            $table->enum('gender', ['male','female']);
            $table->boolean('waliyy_wakeel')->nullable();              //nullable because male members do not need a waliyy and they share a table with female members. This is for
            $table->string('waliyy_wakeel_relationship')->nullable(); //the database only of course
            $table->string('waliyy_wakeel_name')->nullable();
            $table->string('waliyy_wakeel_phone')->nullable();
            $table->string('racial_group');
            $table->string('ethnicity');
            $table->string('nationality');
            $table->string('country_of_origin');
            $table->string('languages');
            $table->string('town_of_residence'); 
            $table->integer('number_of_children'); 
            //$table->integer('number_of_dependent_children'); 
            $table->string('marital_status');    
            $table->integer('number_of_wives')->nullable(); //nullable because this only applies to male members and also a person may not have any wives
            $table->string('education');
            $table->string('employment');
            $table->string('height');
            $table->boolean('revert');
            $table->date('reversion_date')->nullable(); //a person may not be a revert
            $table->boolean('own_accomodation');
            $table->boolean('disabled');
            $table->string('disability')->nullable(); // a person may not be disabled
            $table->boolean('polygnous');
            $table->text('more_info')->nullable(); // a person may not provide more info
            //$table->string('username'); 
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
