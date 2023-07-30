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
        Schema::create('safes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('safe_name')->nullable();
            $table->string('branch_id')->nullable();
            $table->decimal('opening_balance', 8,3)->default(0);
            $table->decimal('balance_now', 8,3)->default(0);
            $table->integer('user_id')->default(1);
            $table->boolean('save_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('safes');
    }
};
