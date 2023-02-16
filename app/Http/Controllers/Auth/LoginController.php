<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\User;


class LoginController extends Controller
{
    public function index()
    {
        return view('User.auth.login');
    }

    public function aktivasi(Request $request, $token)
    {
        $cek_token = User::where('remember_token', $token)->first();

        if(!empty($cek_token))
        {
            User::where('remember_token', $token)->update([
                'aktivasi' => 1,
                'email_verified_at' => date('Y-m-d H:i:s'),
            ]);

            return redirect()->route('login');

        }else{
            return "kosong";
        }
    }
   
}
