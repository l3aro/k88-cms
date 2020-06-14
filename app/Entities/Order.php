<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
