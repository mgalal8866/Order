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
        Schema::table('settings', function (Blueprint $table) {
            $table->boolean('notif_sent_cart')->default(1);
            $table->boolean('notif_change_statu')->default(1);
            $table->boolean('notif_neworder')->default(1);
            $table->boolean('notif_newoffer')->default(1);
            $table->boolean('notif_welcome')->default(1);
            $table->boolean('notif_chat')->default(1);

            $table->string('notif_cart_text')->nullable();
            $table->string('notif_change_text')->nullable();
            $table->string('notif_neworder_text')->nullable();
            $table->string('notif_newoffer_text')->nullable();
            $table->string('notif_welcome_text')->nullable();
            $table->string('notif_newchat_text')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
};
