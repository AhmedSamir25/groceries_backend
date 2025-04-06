<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // علاقة مع جدول المستخدمين
            $table->string('user_name'); 
            $table->string('user_email');
            $table->string('phone'); 
            $table->text('address'); 
            $table->decimal('total_price', 10, 2); 
            $table->string('status')->default('pending'); 
            $table->timestamps();
        });

        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // علاقة مع جدول الطلبات
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // علاقة مع جدول المنتجات
            $table->integer('quantity'); 
            $table->decimal('price', 10, 2); 
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('order_product');
        Schema::dropIfExists('orders');
    }
};
