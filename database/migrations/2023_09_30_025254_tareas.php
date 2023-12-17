<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tareas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id_task');
            $table->string('name_task');
            $table->text('description');
            $table->bigInteger('user_creation');
            $table->bigInteger('user_assigned');
            $table->string('priority');
            $table->string('priority_color');
            $table->string('state');
            $table->string('state_color');
            $table->date('creation_date')->nullable();
            $table->date('expiration_date')->nullable();
            $table->integer('percentage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
