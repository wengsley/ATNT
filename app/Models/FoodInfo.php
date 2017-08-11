<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodInfo extends Model
{
	use SoftDeletes;
	
    protected $table = 'food_information';
	
	protected $hidden = [];

    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
