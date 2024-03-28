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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('full_name')->virtualAs('concat(first_name, \' \', last_name)');
            $table->string('address');
            $table->foreignId('provincecan_id')->contrained();
            $table->foreignId('citycan_id')->constrained();
            $table->string('postal_code');
            $table->string('email')->unique();
            $table->string('password')->default(Hash::make('password'));
            $table->date('date_of_birth');
            $table->string('filedoc')->nullable();
            $table->string('mobile_no')->unique();
            $table->string('home_no')->nullable();
            $table->date('date_hired');
            $table->text('note')->nullable();
            $table->boolean('agent_type')->default(1);
             $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
