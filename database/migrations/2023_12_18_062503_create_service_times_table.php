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
        Schema::create('service_times', function (Blueprint $table) {
            $table->id();
            $table->time('service_time');
            $table->enum('status',['available' , 'unavailable']);
            $table->foreignId('service_id')->references('id')->on('services');
            $table->foreignId('serviceday_id')->references('id')->on('servicedays');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_times');
    }
};
