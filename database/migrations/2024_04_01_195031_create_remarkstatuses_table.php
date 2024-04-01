<?php

use App\Models\Remarkstatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('remarkstatuses', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_number');
            $table->foreignId('booking_id')->reference('id')->on('bookings');
            $table->bigInteger('manual_invoice')->nullable();
            $table->foreignId('statuscategory_id')->reference('id')->on('statuscategories')->constrained();
            $table->foreignId('user_id')->reference('id')->on('users')->constrained();
            $table->boolean('is_resolved')->default(false);
            $table->string('status')->default(Remarkstatus::STATUS['Open']);
            $table->foreignId('assign_by')->reference('id')->on('users');
            $table->longtext('assign_to');
            $table->longtext('sender_comment')->nullable();
            $table->longtext('receiver_comment')->nullable();
            $table->longText('invoicedoc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remarkstatuses');
    }
};
