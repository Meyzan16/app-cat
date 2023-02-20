<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = User::where('email', Session::get('email'))->first();

        if(!empty($user))
        {
            return view('User.main.dashboard', compact('user'));
        }else{
            return abort(404);
        }   
    }
}
