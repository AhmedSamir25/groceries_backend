<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'phone',
        'address',
        'total_price',
        'status',
    ];

   
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }
}
