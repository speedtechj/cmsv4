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
        Schema::create('zoneprices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('servicetype_id')->constrained();
            $table->foreignId('boxtype_id')->constrained();
            $table->foreignId('zone_id')->constrained();
            $table->foreignId('branch_id')->constrained();
            $table->unsignedBigInteger('price');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zoneprices');
    }
};
