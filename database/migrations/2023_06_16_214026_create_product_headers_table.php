<?php

use Brick\Math\BigInteger;
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
        Schema::create('product_headers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name')->nullable();//اسم المنتج
            $table->integer('product_category')->nullable();//التصنيف
            $table->boolean('product_acteve')->default(1)->nullable();//مفعل او لا
            $table->boolean('product_isscale')->default(0)->nullable();
            $table->boolean('product_online')->default(1)->nullable();
            $table->boolean('product_tax')->default(0)->nullable();//ألضريبة
            $table->integer('product_limit')->nullable();//حد الطلب
            $table->integer('user_id')->default(1)->nullable();//حد الطلب
            $table->integer('product_limit_day')->nullable();//تنبيه قبل انتهاء الصلاحية
            $table->text('product_note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_headers');
    }
};
