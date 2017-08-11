<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Illuminate\Foundation\Auth\ThrottlesLogins; 
use Illuminate\Http\Request;
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
    public function ApiDeviceCall(Request $request)
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

        if($data['device_id'] == "123456") {
            $return_data = [
                "status" => "connected",
                "name" => "Wakka",
                "heartbeat" => $heartbeat,
                "bmi" => $bmi_status,
                "calories" => '300'
            ];
        }

        return Tool::returnJson($return_data);
    }

    public function ApiFoodResult(Request $request)
    {
        $data = $request->all();
        
        $food_info = FoodInfo::find($data['food_id']);

        return Tool::returnJson($food_info);
    }

    public function ApiCompareFood(Request $request)
    {
        $data = $request->all();
        $status = null;
        $food_info = FoodInfo::find($data['food_id']);

        if($food_info['calories'] > 300) {
            $status = "bad";
        } else {
            $status = "good";
        }

        $food_info['status'] = $status;

        return Tool::returnJson($food_info);
    }

    public function ApiAfterMeal(Request $request)
    {
        $data = $request->all();
        $return_data = [];
        $bmi_status = null;
        $heartbeat = rand(95,110);

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

        if($data['device_id'] == "123456") {
            $return_data = [
                "status" => "connected",
                "name" => "Wakka",
                "heartbeat" => $heartbeat,
                "bmi" => $bmi_status,
                "calories" => '700'
            ];
        }

        return Tool::returnJson($return_data);
    }
}
