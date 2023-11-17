<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->id('bookmark_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('blog_id');
            $table->timestamps();

            $table->foreign('blog_id')->references('blog_id')->on('blogdatas');
            $table->foreign('user_id')->references('id')->on('trendusers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookmarks');
    }
};
