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
        Schema::create('shifts', function (Blueprint $table) {
            $table->increments('Shift_Id');
            $table->integer('UserId')->nullable();
            $table->integer('SafeId')->nullable();
            $table->timestamp('StartDate')->nullable();
            $table->decimal('FirstBalance', 18, 2)->nullable();
            $table->datetime('EndDate')->nullable();
            $table->decimal('LastBalance', 18, 2)->nullable();
            $table->decimal('totalSaels', 18, 2)->nullable();
            $table->decimal('totalRetrnSaels', 18, 2)->nullable();
            $table->decimal('totalPorshes', 18, 2)->nullable();
            $table->decimal('totalRetrnProsh', 18, 2)->nullable();
            $table->decimal('totalSalfeat', 18, 2)->nullable();
            $table->decimal('TotalIncome', 18, 2)->nullable();
            $table->decimal('TotalExprte', 18, 2)->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shifts');
    }
};
