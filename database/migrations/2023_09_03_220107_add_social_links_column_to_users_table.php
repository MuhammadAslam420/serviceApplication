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
        Schema::table('users', function (Blueprint $table) {
            $table->string('youtube')->default('www.youtube.com');
            $table->string('instagram')->default('www.youtube.com');
            $table->string('linkedin')->default('www.linkedin.com');
            $table->string('twitter')->default('www.twitter.com');
            $table->string('facebook')->default('www.facebook.com');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('youtube')->default('www.youtube.com');
            $table->string('instagram')->default('www.youtube.com');
            $table->string('linkedin')->default('www.linkedin.com');
            $table->string('twitter')->default('www.twitter.com');
            $table->string('facebook')->default('www.facebook.com');
        });
    }
};
