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
        Schema::create('client_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clientpay_id')->nullable();
            $table->decimal('fromeamount',8,2)->default(0);
            $table->decimal('paidamount',8,2)->default(0);
            $table->decimal('newamount', 8, 2)->default(0);
            $table->string('pay_note')->nullable();
            $table->string('payment_method')->nullable();
            $table->integer('user_id')->default(1);
            $table->integer('safe_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_payments');
    }
};
