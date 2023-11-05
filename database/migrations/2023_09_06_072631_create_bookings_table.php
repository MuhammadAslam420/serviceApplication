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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // User ID as a foreign key
            $table->text('mobile')->nullable();
            $table->text('email')->nullable();
            $table->text('city')->nullable();
            $table->text('country')->nullable();
            $table->text('address')->nullable();
            $table->text('zipcode')->nullable();
            $table->text('state')->nullable();
            $table->double('tax', 10, 2)->default(0);
            $table->double('subtotal', 10, 2)->default(0);
            $table->double('discount', 10, 2)->default(0);
            $table->double('total', 10, 2)->default(0);
            $table->enum('bookingstatus', ['pending', 'confirmed','completed', 'cancelled'])->default('pending');
            $table->timestamps();
            $table->softDeletes();

            // Define foreign key constraint
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
