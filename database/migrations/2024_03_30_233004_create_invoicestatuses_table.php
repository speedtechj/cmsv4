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
        Schema::create('invoicestatuses', function (Blueprint $table) {
            $table->id();
            $table->string('generated_invoice');
            $table->string('manual_invoice')->nullable();
            $table->foreignId('trackstatus_id')->constrained();
            $table->foreignId('provincephil_id')->constrained();
            $table->foreignId('cityphil_id')->constrained();
            $table->foreignId('booking_id')->constrained();
            $table->foreignId('batch_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('receiver_id')->constrained();
            $table->foreignId('sender_id')->constrained();
            $table->foreignId('boxtype_id')->constrained();
            $table->date('date_update');
            $table->text('remarks')->nullable();
            $table->string('location')->nullable();
            $table->string('waybill')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoicestatuses');
    }
};
