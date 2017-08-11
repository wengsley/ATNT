<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Helpers;
use Session;

class Tool
{
    public static function returnJson($data)
    {
        echo json_encode($data);
        exit();
    }

    public static function generateRandomString($length = 10, $int_only = false) {
    	if($int_only == false) {
    		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	} else {
    		$characters = '0123456789';
    	}
    	
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
    }
    
    public static function getNumberFormat($number, $decimal = true)
    {
        if ($decimal) {
            return sprintf("%.4f", round($number, 4));
        } else {
            return round($number);
        }
    }

    public static function ConvertNumber()
    {
        
    }
}
