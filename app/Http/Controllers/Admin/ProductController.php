<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function store()
    {
        //
    }

    public function edit()
    {
        return view('admin.products.edit');
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
