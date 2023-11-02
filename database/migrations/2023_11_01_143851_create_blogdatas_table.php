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
        Schema::create('blogdatas', function (Blueprint $table) {
            $table->id('blog_id');
            $table->string('title')->nullable();
            $table->string('heading')->nullable();
            $table->text('short_desc')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('cat_id');
            $table->foreign('cat_id')->references('cat_id')->on('trendcategories');
            $table->string('blog_summary')->nullable();
            $table->string('banner_img')->nullable();
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
        Schema::dropIfExists('blogdatas');
    }
};
