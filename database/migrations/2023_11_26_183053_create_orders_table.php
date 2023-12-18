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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
			$table->foreignId('user_id')->constrained('users');
            $table->string('name')->nullable();
            $table->string('address')->nullable();
			$table->date('DateOfOrder')->required();
			$table->string('OrderNumber');
			$table->decimal('total')->required();
            $table->decimal('discountValue')->nullable();
            $table->string('totalAfterDisc')->required();
            $table->string('PaymentReference')->nullable();
            $table->enum('PaymentStatus',['cash','visa'])->nullable();
            $table->enum('status',['waiting','current','previous'])->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
