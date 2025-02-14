<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'orderdetails';
    protected $fillable = [
        'order_id',
        'product_id',
        'qty',
        'price',

        // Thêm các trường khác nếu cần
    ];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
