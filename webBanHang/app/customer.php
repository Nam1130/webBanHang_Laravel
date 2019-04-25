<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
	protected $table = 'customer';
	protected $fillabel = ['id','name','gender','email','address','phone_number','note','updated_at','created_at'];
}
