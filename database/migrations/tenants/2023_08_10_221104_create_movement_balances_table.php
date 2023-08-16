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
        Schema::create('movement_balances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from_safe_id')->nullable();
            $table->integer('to_safe_id')->nullable();
            $table->decimal('balance_frome', 18, 0)->nullable();
            $table->decimal('balance_To', 18, 0)->nullable();
            $table->decimal('balance_frome_after', 18, 0)->nullable();
            $table->decimal('balance_To_after', 18, 0)->nullable();
            $table->decimal('balance_convert', 18, 0)->nullable();
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movement_balances');
    }
};
