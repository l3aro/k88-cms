<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entities\Product;
use Mail;
use App\Mail\WelcomeMail;

class TestController extends Controller
{
    public function welcome()
    {
        Mail::to('dgbao1340@gmail.com')->send(new WelcomeMail);
        return response()->json([
            'message' => 'good evening'
        ], 200);
    }

    public function goodbye()
    {
        $product = Product::first();
        return response()->json([
            'errorCode' => 99,
            'message' => 'bye bye',
            'product' => $product,
            'data' => [
                'product' => $product
            ]
        ], 400);
    }
}
