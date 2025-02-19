<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'code',
        'customer_id'
        // Thêm các trường khác nếu cần
    ];

    public function orderItems()
    {
        return $this->hasmany(OrderDetail::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function getstatusLabelAttribute()
    {
        switch ($this->status) {
            case 1:
                return 'just ordered';
            case 2:
                return 'confirmed';
            case 3:
                return 'packing';
            case 4:
                return 'transfer to shipper';
            case 5:
                return 'are delivering';
            case 6:
                return 'delivered';
            case 7:
                return 'failed delivery';
            case 8:
                return 'cancel order';
        }
    }
}
