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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_name', 50);
            $table->string('email');
            $table->string('address', 200);
            $table->string('phone_number', 20);
            $table->timestamp('order_date', $precision = 0);
            $table->string('note', 1000);
            $table->integer('status');
            $table->integer('total_money');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
