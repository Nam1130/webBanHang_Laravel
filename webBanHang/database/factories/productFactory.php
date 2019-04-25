<?php

use Faker\Generator as Faker;
use App\category;
$factory->define(App\products::class, function (Faker $faker) {
	return [

		'name' => $faker->name,
		'code' => $faker->paragraph,
		
		'category_id' => factory('App\category')->create()->id,
		'price' =>$faker->randomNumber($nbDigits = 8),
		'quantity' =>$faker->randomNumber($nbDigits = 8),
		'image' => $faker->image('public/images',400,300, null, false),
		
		'oldPrice' => $faker->randomNumber($nbDigits = 8),
		'imported_date' => '2018-10-02',
		'status' => '1',
		
	];
});
