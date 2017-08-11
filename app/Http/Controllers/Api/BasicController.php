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
use App\Models\FoodInfo;

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
    public function ApiDeviceCall(Requests $request)
    {
        $data = $request->all();
        $return_data = [];
        $bmi_status = null;
        $heartbeat = rand(80,100);

        $height = $data['height'];
        $weightx2 = (int)$data['weight']*(int)$data['weight'];

        $bmi = $data['height']/$weightx2;
        $bmi_result = $bmi*10000;

        if($bmi_result > 24.99) {
            $bmi_status = 'overweight';
        } else if($bmi_result < 18.50) {
            $bmi_status = 'underweight';
        } else {
            $bmi_status = 'normal';
        } 

        if($data['device_id' == "123456"]) {
            $return_data = [
                "status" => "connected",
                "name" => "Wakka",
                "heartbeat" => $heartbeat,
                "bmi" => $bmi_status,
            ]
        }

        return Tool::returnJson($return_data);
    }

    public function ApiFoodResult(Requests $request)
    {
        $data = $request->all();
        
        $data['food_id']
        
        return Tool::returnJson($return_data);
    }
}
