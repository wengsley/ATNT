<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Illuminate\Foundation\Auth\ThrottlesLogins; 
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Session;
use Eloquent;
use Form;
use Html;

use App\Models\User;

class AuthController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /*
     * Implemented By Ong Weng Yew
     * Show the Login Page 
     */
    public function showLogin()
    {
        $userCount = User::count();

        if($userCount > 0) {

            return view('auth/login');
        }
        
    }
}
