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
            $table->decimal('calories', 8,2);
            $table->decimal('water', 8,2);
            $table->decimal('protein', 8,2);
            $table->decimal('carbohydrates', 8,2);
            $table->decimal('sugar', 8,2);
            $table->decimal('fiber', 8,2);
            $table->decimal('fat', 8,2);
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('nutritions');
    }
};
