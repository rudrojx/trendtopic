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
        Schema::create('blogcomments', function (Blueprint $table) {
            $table->id('post_id');
            $table->integer("blog_id")->nullable(false);
            $table->string("username")->nullable(false);
            $table->integer("userid")->nullable(false);
            $table->text("comment")->nullable(false);
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
        Schema::dropIfExists('blogcomments');
    }
};
