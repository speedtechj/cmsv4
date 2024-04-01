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
        Schema::create('statuscategories', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->boolean('is_active')->default(true);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('branch_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statuscategories');
    }
};
