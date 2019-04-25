<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bills extends Model
{
    protected $table = 'bills';
	protected $fillabel = ['id','id_customer','date_order','total','payment','note','updated_at','created_at'];
}
