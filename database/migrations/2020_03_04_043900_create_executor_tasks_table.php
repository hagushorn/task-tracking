<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExecutorTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('executor_tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idExecutor')->unsigned();
            $table->bigInteger('idTask')->unsigned();

            $table->foreign('idExecutor')->references('id')->on('executors');
            $table->foreign('idTask')->references('id')->on('tasks');
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
        Schema::dropIfExists('executor_tasks');
    }
}
