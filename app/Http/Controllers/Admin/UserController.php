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

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique',
            'name' => 'required',
            'password' => 'required|confirmed',
        ]);
    }

    public function edit()
    {
        return view('admin.users.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique',
            'name' => 'required',
            'password' => 'required|confirmed',
        ]);
    }

    public function destroy()
    {
        //
    }
}
