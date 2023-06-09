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
        Schema::create('user_admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fsm')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('emp_id')->nullable();
            $table->string('user_type')->default(1)->nullable();
            $table->string('note')->nullable();
            $table->string('remember_token')->nullable();
            $table->boolean('active')->default(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_admins');
    }
};
