<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = getUser();
        if ($user->phone) {
            return view('index');
        } else {
            return view('phone');
        }
    }

    public function sendMessage(Request $request)
    {
        $phone = $request->phone;
        $code = rand(1000, 9999);
        Cache::put('code' . $phone, $code, 10);
        $res = sendSms($phone, 'SMS_76010078', $code);
        return response()->json(['data' => $res]);
    }
}
