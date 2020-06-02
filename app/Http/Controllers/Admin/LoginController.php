<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credentials = $request->only(['email', 'password']);
        // $credentials = array_merge($credentials, ['type' => 'admin']);
        // $credentials['type'] = 'admin';
        if (Auth::attempt($credentials)) {
            return redirect('/admin');
        }
        return back()->withInput(['email'])
            ->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect('/admin/login');
    }
}
