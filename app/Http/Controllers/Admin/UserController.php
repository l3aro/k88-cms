<?php

namespace App\Http\Controllers\Admin;

use App\Entities\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        // DB::table('users')->whereName('Baro')->update([
        //     'created_at' => now(),
        //     'updated_at' => now(),
        //     'email' => 'barok@mail.com',
        //     'name' => 'Baro Kiteer'
        // ]);
        $users = User::with('roles')->get();
        debugbar()->info($users[0]->name);
        return view('admin.users.index', [
            'users' => $users
        ]);
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
