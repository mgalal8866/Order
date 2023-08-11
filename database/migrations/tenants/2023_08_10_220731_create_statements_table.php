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
        Schema::create('statements', function (Blueprint $table) {
            $table->increments('Statement_id');
            $table->integer('Emp_id')->nullable();
            $table->string('Statements_Type')->nullable();
            $table->string('Statements_TypeDetils')->nullable();
            $table->decimal('Amount', 18, 0)->nullable();
            $table->text('note')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('safe_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statements');
    }
};
