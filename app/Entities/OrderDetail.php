<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
