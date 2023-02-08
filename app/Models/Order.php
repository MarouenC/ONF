<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'product_id',
        'status',
        'quantity'
    ];

    public function user(){ // $order->user
        return $this-> belongsTo(User::class);
    }
    public function product(){ // $order->product
        return $this-> belongsTo(Product::class);
    }
}
