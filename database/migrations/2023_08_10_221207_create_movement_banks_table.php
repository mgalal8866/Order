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
        Schema::create('movement_banks', function (Blueprint $table) {
            $table->increments('bank_id');
            $table->integer('from_bank_id')->nullable();
            $table->integer('to_bank_id')->nullable();
            $table->decimal('balance_frome', 18, 2)->nullable();
            $table->decimal('balance_To', 18, 2)->nullable();
            $table->decimal('balance_frome_after', 18, 2)->nullable();
            $table->decimal('balance_To_after', 18, 2)->nullable();
            $table->decimal('balance_convert', 18, 2)->nullable();
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movement_banks');
    }
};
