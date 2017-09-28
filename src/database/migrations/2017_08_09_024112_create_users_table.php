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
        //Create the users table, created after the comment
        //and ticket tables
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('fname');
            $table->string('lname');
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->timestamps();
        });

        //Create the foreign key in the tickets table
        Schema::table('tickets', function ($table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });

        //Create the foreign key in the comments table
        Schema::table('comments', function ($table) {
            //Nullable if it is a staff comment instead
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
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
