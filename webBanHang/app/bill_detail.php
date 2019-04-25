<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill_detail extends Model
{
    protected $table = 'bill_detail';
	protected $fillabel = ['id','id_bill','id_product','quantity','unit_price','updated_at','created_at'];
}
