<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $fillable = [
    //     'name',
    //     'sku',
    //     'category_id',
    //     'price',
    //     'quantity'
    // ];

    protected $guarded = ['id'];

    protected $table = 'products';
}