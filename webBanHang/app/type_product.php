<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type_product extends Model
{
    protected $table = 'type_products';
	protected $fillabel = ['id','name','description','image','updated_at','created_at'];
	public function products() {
		return $this->hasMany('App\type_product','id_type','id');
	}
}

 