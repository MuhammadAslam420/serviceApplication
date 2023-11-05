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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('code', 3);
			$table->string('name', 50)->nullable();
			$table->string('symbol', 5)->nullable();
			$table->string('html_entities', 30)->nullable()->comment('HTML Entities of Symbols: https://gist.github.com/Gibbs/3920259');
			$table->boolean('in_left')->unsigned()->nullable()->default('0');
			$table->integer('decimal_places')->unsigned()->nullable()->default('0')->comment('Currency Decimal Places - ISO 4217');
			$table->string('decimal_separator', 10)->nullable()->default('.');
			$table->string('thousand_separator', 10)->nullable()->default(',');
			$table->unique(["code"]);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};