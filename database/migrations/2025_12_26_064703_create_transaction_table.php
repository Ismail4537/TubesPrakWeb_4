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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
            $table->foreignId('registrant_id')->constrained('registrants')->onDelete('cascade');
            $table->foreignId('payer_user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('payee_user_id')->constrained('users')->onDelete('cascade');
            $table->unsignedBigInteger('amount');
            $table->string('status')->default('pending');
            $table->string('payment_type')->nullable();
            $table->string('midtrans_transaction_id')->nullable();
            $table->string('snap_token')->nullable();
            $table->string('snap_redirect_url')->nullable();
            $table->json('raw_notification')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
