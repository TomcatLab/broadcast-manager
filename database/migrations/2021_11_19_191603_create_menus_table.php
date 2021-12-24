<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('key')->nullable();
            $table->integer('parent')->nullable();
            $table->integer('location')->nullable();
            $table->integer('item_0')->nullable();
            $table->integer('item_1')->nullable();
            $table->integer('item_2')->nullable();
            $table->integer('item_3')->nullable();
            $table->integer('item_4')->nullable();
            $table->integer('item_5')->nullable();
            $table->integer('item_6')->nullable();
            $table->integer('item_7')->nullable();
            $table->integer('item_8')->nullable();
            $table->integer('item_9')->nullable();
            $table->integer('item_10')->nullable();
            $table->integer('item_11')->nullable();
            $table->integer('item_12')->nullable();
            $table->integer('item_13')->nullable();
            $table->integer('item_14')->nullable();
            $table->integer('item_15')->nullable();
            $table->integer('item_16')->nullable();
            $table->integer('item_17')->nullable();
            $table->integer('item_18')->nullable();
            $table->integer('item_19')->nullable();
            $table->integer('item_20')->nullable();
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
        Schema::dropIfExists('menus');
    }
}
