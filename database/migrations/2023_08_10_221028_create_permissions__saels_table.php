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
        Schema::create('permissions_saels', function (Blueprint $table) {
            $table->increments('Permissions_Saels_id');
            $table->integer('User_id')->nullable();
            $table->string('Passwrd_Selas')->nullable();
            $table->boolean('Saels_Leve')->nullable();
            $table->boolean('Saels_Delvery')->nullable();
            $table->boolean('Saels_Agel')->nullable();
            $table->boolean('Descuont_Product')->nullable();
            $table->boolean('Descuont_G')->nullable();
            $table->boolean('ADD_G')->nullable();
            $table->boolean('ADD_M')->nullable();
            $table->boolean('Descount_M')->nullable();
            $table->boolean('Prent_Selas')->nullable();
            $table->integer('Seals_Count')->nullable();
            $table->boolean('bay_Tayp')->nullable();
            $table->boolean('Edite_Saels_Dlevry')->nullable();
            $table->boolean('Done_1_Saels_Delvry')->nullable();
            $table->boolean('Done_ALL_Delvry')->nullable();
            $table->boolean('Cancel_1_Delvry')->nullable();
            $table->boolean('DeleteCode')->nullable();
            $table->boolean('SershSaels')->nullable();
            $table->boolean('TotalSaelsDelvry')->nullable();
            $table->boolean('TotalSaels')->nullable();
            $table->boolean('EditeCostDelvry')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions_saels');
    }
};
