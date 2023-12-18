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
        Schema::create('book_services', function (Blueprint $table) {
            $table->id();
            $table->foreignid('user_id')->constrained('users')->ondelete('cascade');
            $table->foreignid('service_id')->constrained('services')->ondelete('cascade');
            $table ->date('date')->required();
            $table ->string('OrderNum')->required();
            $table ->integer('value')->required();
            $table ->Time('time')->required();
            $table ->enum('status',['waiting','current','previous'])->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_services');
    }
};
