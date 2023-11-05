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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->double('price', 10, 2);
            $table->text('description');
            $table->string('image');
            $table->text('gallery')->nullable();
            $table->string('city');
            $table->unsignedBigInteger('service_type_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('type', ['free', 'paid'])->default('free');
            $table->enum('approved', ['yes', 'no'])->default('no');
            $table->integer('position')->default(0);
            $table->integer('vip')->default(0);
            $table->integer('duration')->default(10);
            $table->integer('views')->default(0);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('service_type_id')->references('id')->on('service_types')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
