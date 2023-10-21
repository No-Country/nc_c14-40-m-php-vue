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
        Schema::create('reservation_tables', function (Blueprint $table) {
            $table->unsignedBigInteger('reservation_table_specs')->nullable();
            $table->unsignedBigInteger('table_id');
            $table->unsignedBigInteger('date_id')->nullable();
            // Define primary key
            // $table->primary(['reservation_id', 'user_id', 'restaurant_id', 'table_id']);
            // Define foreign keys
            $table->foreign('reservation_table_specs')->references('id')->on('reservations_specs')->onDelete('cascade');
            $table->foreign('table_id')->references('id')->on('tables')->onDelete('cascade');
            $table->foreign('date_id')->references('id')->on('available_dates')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_tables');
    }
};
