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
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('abbr', 10);
			$table->string('locale', 20)->nullable();
			$table->string('name', 100);
			$table->string('native', 20)->nullable();
			$table->string('flag', 100)->nullable();
			$table->string('app_name', 100)->nullable();
			$table->string('script', 20)->nullable();
			$table->enum('direction', ['ltr', 'rtl'])->nullable()->default('ltr');
			$table->boolean('russian_pluralization')->unsigned()->nullable()->default('0');
			$table->string('date_format', 100)->nullable();
			$table->string('datetime_format', 100)->nullable();
			$table->boolean('active')->nullable()->default('1');
			$table->boolean('default')->nullable()->default('0');
			$table->integer('parent_id')->unsigned()->nullable();
			$table->integer('lft')->unsigned()->nullable();
			$table->integer('rgt')->unsigned()->nullable();
			$table->integer('depth')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
