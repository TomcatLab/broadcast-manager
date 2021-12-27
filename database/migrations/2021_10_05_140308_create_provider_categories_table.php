<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('provider')->nullable();
            $table->string('key')->nullable();
            $table->integer('category')->nullable();
            $table->integer('count')->nullable();
            $table->string('feedurl')->nullable();
            $table->integer('country')->nullable();
            $table->string('image')->nullable();
            $table->string('og_title')->nullable();
            $table->string('og_keywords')->nullable();
            $table->string('og_description')->nullable();
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
        Schema::dropIfExists('provider_categories');
    }
}
