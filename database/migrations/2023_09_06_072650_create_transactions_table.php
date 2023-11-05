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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // User ID as a foreign key
            $table->unsignedBigInteger('booking_id'); // Booking ID as a foreign key
            $table->enum('payment_mode', ['credit_card', 'paypal', 'cash','jazzcash','easypaisa','bank']);
            $table->double('total', 10, 2);
            $table->enum('status', ['pending', 'completed', 'failed']);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('booking_id')->references('id')->on('bookings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
