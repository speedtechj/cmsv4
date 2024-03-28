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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('servicetype_id')->reference('id')->on('servicetypes')->constrained();
            $table->foreignId('boxtype_id')->reference('id')->on('boxtypes')->constrained();
            $table->foreignId('zone_id')->reference('id')->on('zones')->constrained();
            $table->foreignId('user_id')->reference('id')->on('users')->constrained();
            $table->foreignId('branch_id')->reference('id')->on('branchs')->constrained();
            $table->string('code');
            $table->string('description');
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('discount_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
