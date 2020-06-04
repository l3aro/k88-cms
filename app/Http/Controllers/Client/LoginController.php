<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';
    protected $maxAttempts = 10;
    protected $decayMinutes = 5;

    public function showLoginForm()
    {
        return view('client.auth.login');
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        // $credentials['type'] = 'client';
        return $credentials;
    }

    protected function guard()
    {
        return Auth::guard('client');
    }
}
