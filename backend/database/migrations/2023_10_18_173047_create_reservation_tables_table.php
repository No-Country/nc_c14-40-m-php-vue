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
            $table->unsignedBigInteger('reservation_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('table_id');
            
            // Define primary key
            $table->primary(['reservation_id', 'user_id', 'restaurant_id', 'table_id']);
            
            // Define foreign keys
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('set null');
            $table->foreign('table_id')->references('id')->on('table')->onDelete('set null');
            
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
