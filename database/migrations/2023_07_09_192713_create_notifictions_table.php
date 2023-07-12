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
        Schema::create('notifictions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('body')->nullable();
            $table->string('image')->nullable();
            $table->integer('user_id')->nullable();
            $table->json('results')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifictions');
    }
};
