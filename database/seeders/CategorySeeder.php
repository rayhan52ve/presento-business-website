<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $categories = [
            ['name'=>'Foreign Country'],
            ['name'=>'Tavel'],
            ['name'=>'Bike Tour'],
            ['name'=>'Long Drive'],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
