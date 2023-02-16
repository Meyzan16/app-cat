<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserVerify;
use Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('User.auth.register');
    }

    public function create(Request $request)
    {
        $rules = [
            'nama'=> 'required',
            'email'=> 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ];

        //pasang pesan kesalahan
        $messages = [
            'nama.required'     => 'nama wajib diisi',
            'email.required'     => 'email wajib diisi',
            'email.email'     => 'email tidak valid',
            'email.unique'     => 'email sudah terdaftar wajib diisi',
            'password.required'     => 'password wajib diisi',
            'password.min'     => 'password terlalu pendek',
            'password_confirmation.same'     => 'password tidak sama',
            'password_confirmation.required'     => 'konfirmasi password wajib diisi',

           
        ];

        //ambil semua request dan pasang rules dan isi pesanya
        $validator = Validator::make($request->all(), $rules, $messages);
        //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
        if($validator->fails())
        {
           
                return redirect()->back()->withErrors($validator)->withInput($request->all());
        } 
        else{
       
            $token = Str::random(64);

            $email = $request->email;

            User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'remember_token' => $token,
            ]);

             

                        $data_email = [
                            'subject' => 'Verifikasi Email',
                            'nama' => $request->nama,
                            'token' => $token
                        ];

                        
                        Mail::to($email)->send(new SendEmail($data_email));

            return redirect()->route('login')->with(['toast_success' =>  'Data Berhasil Di simpan']);
        }
    }
}
