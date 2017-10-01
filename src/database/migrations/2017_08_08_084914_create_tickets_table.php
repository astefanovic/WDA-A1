<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create the tickets table, foreign keys will be created by
        //the other tables when they are created
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->string('type');
            $table->string('desc');
            //Goes from pending->in progress->resolved/unresolved
            $table->string('status');
            //Can be low/mod/high
            $table->string('priority');
            //Can be 1/2/3
            $table->string('escalation');
            //Only resolved/unresolved can be completed
            $table->boolean('completed');
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
        Schema::dropIfExists('tickets');
    }
}
