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
        $users = User::select(['id', 'name', 'email', 'address'])
            // ->whereName('Baro')
            // ->limit(2)
            // ->offset(1)
            // ->skip(1)
            // ->take(2)
            ->get();
        // $user = DB::table('users')
        //     ->whereName('Baro')
        //     ->first();
        // print_r($users);
        // DB::table('users')->insert([
        //     'name' => 'Boss',
        //     'email' => 'boss@mail.com',
        //     'password' => '123123123',
        // ]);
        // $user = DB::table('users')->where('email', '=', 'boss@mail.com')->first();
        // print_r($user);
        // die;
        debugbar()->info($users[0]->name);
        // debugbar()->info($user->name);
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
