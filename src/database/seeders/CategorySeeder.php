<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

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
            '農業',
            '狩猟',
            '家',
            'トラブル',
        ];

        foreach ($categories as $name) {
            Category::updateOrCreate(
                ['name' => $name],
                ['name' => $name]
            );
        }
    }
}
