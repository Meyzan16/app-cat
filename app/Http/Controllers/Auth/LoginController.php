<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


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

    public function authenticate(Request $request)
    {
         //pasang rules
         $rules = [
            'email' => 'required|email',
            'password'=> 'required'
        ];

        //pasang pesan kesalahan
        $messages = [
            'email.required'     => 'Form email wajib diisi',
            'email.email'     => 'email tidak valid',
            'password.required'     => 'Form password wajib diisi',
        ];

        //ambil semua request dan pasang rules dan isi pesanya
        $validator = Validator::make($request->all(), $rules, $messages);
        //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
        if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        //jika berhasil jalankan script berrikut
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            if (Auth::check()) {
                if(auth()->user()->aktivasi == 1 )
                {
                    
                        Session::put('kode_prodi', auth()->user()->kode_prodi);
                        $request->session()->regenerate();
                        return \redirect()->route('user.dashboard')->with('successs', 'Selamat datang '. auth()->user()->nama);
                }else{
                    return redirect()->route('login')->with('loginerror','Akun belum diaktivasi');
                }
            }
        }else{
            return back()->with('loginerror', 'Email dan Password Salah');
        }
    }
   
}
