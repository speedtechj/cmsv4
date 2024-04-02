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
        Schema::create('invattaches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id');
            $table->foreignId('sender_id');
            $table->foreignId('user_id');
            $table->longText('invattachment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invattaches');
    }
};