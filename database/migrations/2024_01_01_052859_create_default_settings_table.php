<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('default_settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name');
            $table->string('app_url');
            $table->string('favicon');
            $table->string('logo');
            $table->string('main_phone_number');
            $table->string('support_phone_number')->nullable();
            $table->string('main_email');
            $table->string('support_email')->nullable();
            $table->text('address');
            $table->text('google_map_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('default_settings');
    }
};
