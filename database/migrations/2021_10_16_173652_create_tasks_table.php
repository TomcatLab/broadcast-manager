<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->string('action')->nullable();
            $table->string('facade')->nullable();
            $table->string('key')->nullable();
            //$table->string('status')->nullable();
            $table->string('param_1')->nullable();
            $table->string('param_2')->nullable();
            $table->string('param_3')->nullable();
            $table->string('param_4')->nullable();
            $table->string('param_5')->nullable();
            $table->string('param_6')->nullable();
            $table->string('param_7')->nullable();
            $table->string('param_8')->nullable();
            $table->string('param_9')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
