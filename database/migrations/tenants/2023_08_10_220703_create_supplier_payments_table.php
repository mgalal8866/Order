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
        Schema::create('supplier_payments', function (Blueprint $table) {
            $table->increments('PaymentsSup_id');
            $table->integer('SupplierPay_Id')->nullable();
            $table->decimal('FromeAmount', 18, 0)->nullable();
            $table->decimal('PaidAmount', 18, 0)->nullable();
            $table->decimal('NewAmount', 18, 0)->nullable();
            $table->text('Pay_note')->nullable();
            $table->string('Payment_method')->nullable();
            $table->integer('user_id');
            $table->integer('safe_id');
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_payments');
    }
};
