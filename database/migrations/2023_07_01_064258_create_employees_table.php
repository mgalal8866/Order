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
            $table->string('phone');
            $table->string('identite');
            $table->integer('region_id');
            $table->text('state');
            $table->integer('paytype_id')->default(0);
            $table->decimal('pay_sel',18,2);
            $table->string('total_houre');
            $table->integer('job_id');
            $table->integer('branch_id');
            $table->timestamp('data_active');
            $table->timestamp('data_unactive');
            $table->string('note');
            $table->string('image');
            $table->increments('active');
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
