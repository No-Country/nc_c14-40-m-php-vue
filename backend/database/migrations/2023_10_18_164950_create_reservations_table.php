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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->dateTime('reservation_date');
            $table->integer('quantity_people');
            $table->enum('state_reservation', ['PE', 'CA', 'TE'])->default('PE');
            $table->decimal('price', 10, 2);

            //  // Define primary key
            // $table->primary(['id', 'user_id', 'restaurant_id']);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('set null');

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
