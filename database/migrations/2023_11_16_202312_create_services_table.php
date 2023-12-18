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
	        $table->text('name')->required();
	        $table->decimal('price');
	        $table->decimal('oldprice');
	        $table->string('image')->nullable();
	        $table->text('details');
	        $table->text('description');
	        $table->text('short_description');
	        $table->decimal('total_rate');
            $table->time('start_time')->required();
            $table->time('end_time')->required();
	        $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
			$table->time('duration');
			$table->boolean('status');
	        $table->timestamps();
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
