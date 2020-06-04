<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        session()->put('income', '130000');
    }

    public function __invoke()
    {
        // session()->put('income', '4000000');
        // session()->forget('income');
        return view('admin.dashboard');
    }
}
