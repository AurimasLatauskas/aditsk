<?php

namespace Database\Seeders;

use App\Models\Category;
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
            ['name' => 'Politics'],
            ['name' => 'Sports'],
            ['name' => 'Health'],
            ['name' => 'Business'],
            ['name' => 'Science'],
            ['name' => 'Technology'],
            ['name' => 'Travel']
        ];

        Category::insert($categories);
    }
}
