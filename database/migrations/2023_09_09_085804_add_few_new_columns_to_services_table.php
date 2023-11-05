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
            $table->text('address')->after('city')->default('hussnain town piran ghaib road multan');
            $table->string('zipcode')->after('city')->default('50590');
            $table->string('state')->after('zipcode')->default('punjab');
            $table->double('lat')->after('country_id')->default(33.29379294);
            $table->double('lng')->after('lat')->default(71.25356489);
            $table->double('discount')->after('price')->default(0);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->text('address')->after('city')->default('hussnain town piran ghaib road multan');
            $table->string('zipcode')->after('city')->default('50590');
            $table->string('state')->after('zipcode')->default('punjab');
            $table->double('lat')->after('country_id')->default(33.29379294);
            $table->double('lng')->after('lat')->default(71.25356489);
            $table->double('discount')->after('price')->default(0);
            
        });
    }
};
