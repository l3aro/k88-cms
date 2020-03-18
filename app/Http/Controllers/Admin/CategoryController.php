<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'parent_id' => 'required',
            'name' => 'required'
        ]);
    }

    public function edit()
    {
        return view('admin.categories.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'parent_id' => 'required',
            'name' => 'required'
        ]);
    }

    public function destroy()
    {
        //
    }
}
