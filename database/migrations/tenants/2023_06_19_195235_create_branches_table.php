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
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('branch_name')->nullable();
            $table->string('branch_bus')->nullable();
            $table->string('branch_phone')->nullable();
            $table->string('branch_address')->nullable();
            $table->string('branch_note')->nullable();
            $table->boolean('branch_active')->default(1);
            $table->integer('user_id')->default(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
