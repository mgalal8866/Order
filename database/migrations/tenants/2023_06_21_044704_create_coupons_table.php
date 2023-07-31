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
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->default(1)->nullable();
            $table->string('code');
            $table->string('name');
            $table->float('value')->nullable();
            $table->boolean('type')->default(0)->nullable();// 0 = LE  - 1 = %
            $table->decimal('min_invoce',8,3)->default(0)->nullable();//اقل مبلغ للاستخدام للفاتروه
            $table->integer('used')->default(0)->nullable();//عدد مرات الاستخدام مره 2  3
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();//  انتهاء الكوبون
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
