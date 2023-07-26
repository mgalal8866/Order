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
        Schema::create('user_deliveries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emp_id')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->integer('user_id')->nullable();
            $table->boolean('active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_deliveries');
    }
};
