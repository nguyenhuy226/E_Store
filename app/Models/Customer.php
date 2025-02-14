<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'adddress',
        'email',
        'passwork',
        'ship_name',
        'ship_address',
        'ship_phone',
        'ship_email'


        // Thêm các trường khác nếu cần
    ];
    public function orders()
    {
        return $this->hasmany(Order::class);
    }
}
