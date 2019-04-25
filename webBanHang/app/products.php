<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
	protected $table = 'products';
	protected $fillabel = ['id','name','description','unit_price','id_type','promotion_price','unit','image','new','quantity','updated_at','created_at'];
	public function type_products() {
		return $this->hasMany('App\products','id_type','id');
	}
}