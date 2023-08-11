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
        Schema::create('offer_bays', function (Blueprint $table) {
            $table->increments('Offer_Bay_Id');
            $table->decimal('FromTotal', 12, 2)->nullable();
            $table->decimal('ToTotal', 12, 2)->nullable();
            $table->datetime('FromDate')->nullable();
            $table->datetime('ToDate')->nullable();
            $table->decimal('Discount', 7, 2)->nullable();
            $table->integer('userId');
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer_bays');
    }
};
