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
        $products = Product::with('category')->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'sku' => 'required|unique:products',
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
            'featured',
            'detail',
            'description',
        ]);

        if ($request->hasFile('img')) {
            $imgName = uniqid('vietprok88') . "." . $request->img->getClientOriginalExtension();
            $destinationDir = public_path('files/images/products/');
            $request->img->move($destinationDir, $imgName);
            $input['avatar'] = asset("files/images/products/{$imgName}");
        }

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

    public function destroy($product)
    {
        $deleted = Product::destroy($product);
        if ($deleted) {
            return response()->json([], 204);
        }
        return response()->json(['message' => "Sản phẩm cần xoá không tồn tại."], 404);
    }
}
