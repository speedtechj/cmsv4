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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('branchid')->unique();
            $table->string('business_name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->foreignId('provincecan_id')->constrained();
            $table->foreignId('citycan_id')->constrained();
            $table->string('postal_code');
            $table->string('mobile_no');
            $table->string('phone_no')->nullable();
            $table->string('email')->unique();
            $table->text('note')->nullable();
            $table->longText('file_doc')->nullable();
            $table->date('birth_date')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
