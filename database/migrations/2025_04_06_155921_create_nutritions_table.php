<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('nutritions', function (Blueprint $table) {
            $table->id();  
            $table->decimal('size', 8,2);
            $table->decimal('Calories', 8,2);
            $table->decimal('Water', 8,2);
            $table->decimal('Protein', 8,2);
            $table->decimal('Carbohydrates', 8,2);
            $table->decimal('Sugar', 8,2);
            $table->decimal('Fiber', 8,2);
            $table->decimal('Fat', 8,2);
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('nutritions');
    }
};
