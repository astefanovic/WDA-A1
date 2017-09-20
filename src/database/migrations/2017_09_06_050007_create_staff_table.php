<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('fname');
            $table->string('lname');
            //The type of employee, can be
            //Helpdesk or a Technician
            $table->string('type');
            $table->timestamps();
        });

        //Create the foreign key in the tickets table
        Schema::table('tickets', function ($table) {
            $table->integer('staff_id')->nullable()->unsigned();
            $table->foreign('staff_id')
                ->references('id')->on('staff')
                ->onDelete('cascade');
        });

        //Create the foreign key in the comments table
        Schema::table('comments', function ($table) {
            $table->integer('staff_id')->unsigned();
            $table->foreign('staff_id')
                ->references('id')->on('staff')
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
        Schema::dropIfExists('staff');
    }
}
