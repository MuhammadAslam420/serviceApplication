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
        Schema::table('bookings', function (Blueprint $table) {
           $table->date('booking_date')->nullable()->after('bookingstatus');
           $table->time('booking_time')->nullable()->after('booking_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
           $table->date('booking_date')->nullable()->after('bookingstatus');
           $table->time('booking_time')->nullable()->after('booking_date');
        });
    }
};
