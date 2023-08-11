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
        Schema::create('permission_screnes', function (Blueprint $table) {
            $table->increments('PermissionID');
            $table->integer('userID')->nullable();
            $table->integer('NO_Screne')->nullable();
            $table->boolean('Srene')->nullable();
            $table->boolean('add')->nullable();
            $table->boolean('Ediet')->nullable();
            $table->boolean('Delaet')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permission_screnes');
    }
};
