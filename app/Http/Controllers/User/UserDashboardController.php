<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {

        return view('User.main.dashboard');
    }
}
