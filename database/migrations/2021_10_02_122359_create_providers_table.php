<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('domain')->nullable();
            $table->string('facade')->nullable();
            $table->string('feedurl')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->integer('country')->nullable();
            $table->string('og_title')->nullable();
            $table->string('og_keywords')->nullable();
            $table->string('og_description')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('providers');
    }
}
