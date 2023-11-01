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
        Schema::create('trendusers', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('email',255)->nullable();
            $table->string('github_id',255)->nullable()->unique();
            $table->string('github_token',255)->nullable();
            $table->string('google_id',255)->nullable()->unique();
            $table->string('google_token',255)->nullable();            
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
        Schema::dropIfExists('trendusers');
    }
};
