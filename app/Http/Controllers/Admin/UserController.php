<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store()
    {
        //
    }

    public function edit()
    {
        return view('admin.users.edit');
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
