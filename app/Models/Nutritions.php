<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nutritions extends Model
{
    protected $fillable = ['product_id', 'size', 'calories', 'water', 'protein', 'carbohydrates', 'sugar', 'fiber', 'fat'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
