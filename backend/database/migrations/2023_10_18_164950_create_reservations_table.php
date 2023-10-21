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
        Schema::create('reservations_specs', function (Blueprint $table) {
            $table->id();

            $table->integer('quantity_people');
            $table->enum('state_reservation', ['PE', 'CA', 'TE'])->default('PE');
            $table->decimal('price', 10, 2);

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('restaurant_id');
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
