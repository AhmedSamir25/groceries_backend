<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("detail");
            $table->text("product_image");
            $table->string("weight");
            $table->decimal("price", 10, 2); 
            $table->integer("rating"); 
            $table->integer("number_sales"); 
            $table->boolean("offer")->default(false);
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

   
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
