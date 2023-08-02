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
        Schema::create('delivery_headers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoicenumber')->nullable(); //رقم ال id السيفر
            $table->integer('coupon_id')->nullable(); //
            $table->string('type_order')->default('تم الاستلام'); //استلام الطلب - جاري التجهيز - خرج للتوصيل - تم التوصيل
            $table->integer('comment_id')->nullable(); //
            $table->boolean('invoicetype')->default(0)->nullable();// نوع الفاتورة مرتجع او عادى
            $table->timestamp('invoicedate')->nullable();// الوقت و التاريخ
            $table->integer('client_id')->nullable();//id العميل
            $table->decimal('lastbalance',8,3)->nullable();// الرصيد قبل العملية
            $table->decimal('finalbalance',8,3)->nullable();// الرصيد بعد الفاتورة
            $table->integer('user_id')->nullable();// المستخدم id
            $table->integer('store_id')->default(1)->nullable();// idالمخزن
            $table->integer('safe_id')->default(1)->nullable();//id الخزنة
            $table->string('status')->default('دليفرى')->nullable();//اسم نوع الفاتورة
            $table->integer('employ_id')->default(1)->nullable();// id الموظف  = 1
            $table->boolean('dis_point_active')->default(0)->nullable();//fals
            $table->string('paytayp')->default('كاش')->nullable();// استرنج  كاش
            $table->decimal('subtotal')->nullable();//اجمالى الفاتورة قبل الخصومات
            $table->decimal('totaldiscount',8,3)->nullable();//اجمالى الخصومات
            $table->decimal('discount_g',8,3)->nullable();//اجمالى خصوامات بالجنية
            $table->decimal('discount_f',8,3)->nullable();//اجمالى خصومات  مئوى
            $table->decimal('total_add_amount',8,3)->nullable();//اجمالى الاضافات
            $table->decimal('add_amount_g',8,3)->nullable();//اجمالى اضافات بالجنية
            $table->decimal('add_amount_f',8,3)->nullable();//اجمالى اضافات مئوى
            $table->decimal('discount_product',8,3)->nullable();//اجمالى خصومات الاصناف
            $table->decimal('discount_sales',8,3)->nullable();//اجمالى خصومات على الفاتورة
            $table->decimal('discount_point',8,3)->nullable();//اجمالى خصومات النقاط
            $table->decimal('grandtotal',8,3)->nullable();//الاجمالى النهائى
            $table->decimal('paid',8,3)->nullable();//المدفوع
            $table->decimal('remaining',8,3)->nullable();//المتبقى
            $table->decimal('total_profit',8,3)->nullable();//  اجمالى ارباح الاصناف = اجمالى الارباح
            $table->text('note')->nullable();//ملاحظات
            $table->decimal('deliverycost',8,3)->nullable();//قيمة التوصيل
            $table->boolean('satus_delivery')->default(1)->nullable();//لو الفاتورة غير متممة  الافتراضى  true
            $table->boolean('sales_online')->default(1)->nullable();//لو الفاتورة غير متممة  الافتراضى  true
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_headers');
    }
};
