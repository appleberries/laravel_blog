<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Profile extends Model
{
	protected $fillable = ['user_id'];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
