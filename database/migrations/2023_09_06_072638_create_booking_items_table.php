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
        Schema::create('booking_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id'); // Booking ID as a foreign key
            $table->unsignedBigInteger('provider_id'); // Provider ID as a foreign key
            $table->unsignedBigInteger('service_id'); // Service ID as a foreign key
            $table->decimal('price', 8, 2);
            $table->integer('qty');
            $table->timestamps();
            $table->softDeletes();

            // Define foreign key constraints
            $table->foreign('booking_id')->references('id')->on('bookings');
            $table->foreign('provider_id')->references('id')->on('users');
            $table->foreign('service_id')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_items');
    }
};
