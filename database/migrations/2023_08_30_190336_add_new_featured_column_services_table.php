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
        Schema::table('services', function (Blueprint $table) {
           $table->enum('featured', ['featured','top','vip', 'non-featured'])->default('non-featured')->after('position');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
           $table->enum('featured', ['featured','top','vip', 'non-featured'])->default('non-featured')->after('position');
        });
    }
};
