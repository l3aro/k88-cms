<?php

namespace App\Http\Controllers\Client;

use App\Entities\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate();
        return view('client.product.index', compact('products'));
    }

    public function detail($category, $product)
    {
        $product = Product::findOrFail($product);
        return view('client.product.detail', compact('product'));
    }
}
