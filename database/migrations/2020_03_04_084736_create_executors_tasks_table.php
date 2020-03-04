<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExecutorsTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('executors_tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('executors_id')->unsigned();
            $table->bigInteger('tasks_id')->unsigned();
            $table->foreign('executors_id')->references('id')->on('executors');
            $table->foreign('tasks_id')->references('id')->on('tasks');
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
        Schema::dropIfExists('executors_tasks');
    }
}
