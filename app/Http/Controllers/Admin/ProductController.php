<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Product;
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

        $input = $request->only([
            'category_id',
            'sku',
            'name',
            'price',
            'quantity',
            'img',
            'featured',
            'detail',
            'description',
        ]);
        $product = Product::create($input);
        return redirect("/admin/products/{$product->id}/edit");
    }

    public function edit(Product $product)
    {
        // $product = Product::findOrFail($product);
        // if (!$product) abort(404);
        return view('admin.products.edit', compact('product'));
        // return view('admin.products.edit', ['product' => $product]);
    }

    public function update(UpdateProductRequest $request, $product)
    {
        $input = $request->only([
            'category_id',
            'sku',
            'name',
            'price',
            'quantity',
            'img',
            'featured',
            'detail',
            'description',
        ]);

        $product = Product::findOrFail($product);
        $product->fill($input);
        $product->save();
        return back();
    }

    public function destroy()
    {
        //
    }
}
