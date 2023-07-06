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
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code');
            $table->string('phone')->nullable();
            $table->string('identite')->nullable();
            $table->integer('region_id')->nullable();
            $table->text('state')->nullable();
            $table->integer('paytype_id')->default(0);
            $table->decimal('pay_sel',18,2)->nullable();
            $table->string('total_houre')->nullable();
            $table->integer('job_id')->nullable();
            $table->integer('branch_id')->nullable();
            $table->timestamp('data_active')->nullable();
            $table->timestamp('data_unactive')->nullable();
            $table->string('note')->nullable();
            $table->string('image')->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
