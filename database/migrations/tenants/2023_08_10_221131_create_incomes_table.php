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
        Schema::create('incomes', function (Blueprint $table) {
            $table->increments('income_id');
            $table->integer('incomeTid')->nullable();
            $table->decimal('income_Amount', 18, 0)->nullable();
            $table->text('income_note')->nullable();
            $table->integer('user_id')->nullable();
            $table->boolean('income_acteve')->nullable();
            $table->integer('Safe_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
