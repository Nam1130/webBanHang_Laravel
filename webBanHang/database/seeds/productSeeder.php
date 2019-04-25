<?php

use Illuminate\Database\Seeder;
use App\products;
class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	factory(App\products::class, 3)->create();
    }
}
