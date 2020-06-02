<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        // $arr = [
        //     [
        //         'a' => 3,
        //         'b' => 2,
        //     ],
        //     [
        //         'a' => 5,
        //         'b' => 2,
        //     ],
        // ];

        // foreach ($arr as $key => $value) {
        //     $arr[$key]['c'] = 5;
        //     // print_r($value);die;
        //     // print_r($arr[$key]);die;
        // }
        // print_r($arr);die;
        $categories = $this->getSubCategories(0);
        // print_r($categories->toArray());
        // Category::where('parent_id', 0)->get();
        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    private function getSubCategories($parentId, $ignoreId = null)
    {
        $categories = Category::whereParentId($parentId)
            ->where('id', '<>', $ignoreId)
            ->get();
        $categories->map(function ($category) use($ignoreId) {
            $category->sub = $this->getSubCategories($category->id, $ignoreId);
            return $category;
        });
        return $categories;
    }

    public function create()
    {
        $categories = $this->getSubCategories(0);
        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'parent_id' => 'required',
            'name' => 'required'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->save();
        session()->flash('success', 'Đã tạo mới.');
        return redirect('/admin/categories');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        $products = $category->products()->get();
        debugbar()->info($products);
        // Product::where('category_id', $category->id)->get();
        $categories = $this->getSubCategories(0, $id);
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'parent_id' => 'required',
            'name' => 'required'
        ]);

        $category->fill($request->only(['parent_id', 'name']));
        // $category->parent_id = $request->parent_id
        // $category->name = $request->name
        $category->save();
        return redirect('/admin/categories')->with('success', 'Đã cập nhật.');
    }

    public function destroy()
    {
        //
    }
}
