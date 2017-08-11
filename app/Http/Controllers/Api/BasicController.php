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
use App\Helpers\Tool;
use App\Helpers\UploadTrait;
use App\Models\User;

class BasicController extends Controller
{
	use UploadTrait;
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
    public function ApiCall()
    {
        $user = User::create([

        ]);
        //save as array when insert data

        //return json here
        Tool::returnJson();
    }
}
