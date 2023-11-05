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
        Schema::create('abuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('provider_id')->nullable(); // Add the nullable provider_id column
            $table->text('description');
            $table->string('complainant_type')->nullable(); // Make complainant_type nullable
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->nullable();
            $table->foreign('provider_id')->references('id')->on('users')->nullable(); // Define the foreign key relationship
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abuses');
    }
};
