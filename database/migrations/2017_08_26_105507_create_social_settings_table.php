<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('facebook')->nullable()->default('facebook.com');
            $table->string('twitter')->nullable()->default('twitter.com');
            $table->string('linkedin')->nullable()->default('linkedin.com');
            $table->string('googlePlus')->nullable()->default('googleplus.com');
            $table->string('instagram')->nullable()->default('instagram.com');
            $table->string('tumblr')->nullable()->default('tumblr.com');
            $table->string('whatsApp')->nullable()->default('whatsapp.com');
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
        Schema::dropIfExists('social_settings');
    }
}
