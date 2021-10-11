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
        Category::create([
            'name' => 'Music',
            'slug' => 'music'
        ]);

        Category::create([
            'name' => 'Sports',
            'slug' => 'sports'
        ]);

        Category::create([
            'name' => 'Games',
            'slug' => 'games'
        ]);
    }
}
