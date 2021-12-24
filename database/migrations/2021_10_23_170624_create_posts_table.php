<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->longText('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->string('pub_date')->nullable();
            $table->longText('key')->nullable();
            $table->longText('link')->nullable();
            $table->longText('ext_link')->nullable();
            $table->string('keywords')->nullable();
            $table->boolean('og')->default(0);
            $table->integer('provider')->nullable();
            $table->integer('category')->nullable();
            $table->integer('p_category')->nullable();
            $table->integer('count')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
