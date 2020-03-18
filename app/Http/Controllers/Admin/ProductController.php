<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'sku' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric|min:0',
            'img' => 'sometimes|image',
        ], [
            'sku.required' => 'Thiếu mã sản phẩm'
        ]);
        print_r($request->all());die;
        echo "Good evening";
    }

    public function edit()
    {
        return view('admin.products.edit');
    }

    public function update(UpdateProductRequest $request)
    {
        //
    }

    public function destroy()
    {
        //
    }
}
