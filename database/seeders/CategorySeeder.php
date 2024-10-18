<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
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
        {
            //inserting multiple categories
            //Step 1: create the array of categories
            $categories = [
            ['name' => "Sandwiches"],
            ['name' => "Main Meals"],
            ['name' => "Smoothies and Shakes"],
            ['name' => "Juices and Soda"],
            ['name' => "Hot Drinks"],
            ];
            
            //Step 2: insert the array using Query Builder
            DB::table('categories')->insert($categories);
            }
            
    }
}
