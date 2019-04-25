<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('categories')->insert([
        	['name' => 'Thời trang nam','status' => '1'],
        	['name' => 'Thời trang nử','status' => '1'],
        ]);
    }
}
