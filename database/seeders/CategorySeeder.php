<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'category_1', // 1
                'parent_id' => null,
                'level' => 1, 
            ],
            [
                'name' => 'category_1_1', // 2
                'parent_id' => 1,
                'level' => 2,
            ],
            [
                'name' => 'category_1_2', // 3
                'parent_id' => 1,
                'level' => 2,
            ],
            [
                'name' => 'category_1_2_1', // 4
                'parent_id' => 3,
                'level' => 3,
            ],
            [
                'name' => 'category_2', // 5
                'parent_id' => null,
                'level' => 1,
            ],
            [
                'name' => 'category_3', // 6
                'parent_id' => null,
                'level' => 1,
            ],
            [
                'name' => 'category_3_1', // 7
                'parent_id' => 6,
                'level' => 2,
            ],
            [
                'name' => 'category_3_2', // 8
                'parent_id' => 6,
                'level' => 2,
            ],
            [
                'name' => 'category_3_3', // 9
                'parent_id' => 6,
                'level' => 2,
            ],
            [
                'name' => 'category_3_4', // 10
                'parent_id' => 6,
                'level' => 2,
            ],
        ];

        foreach ($data as $column) {
            Category::create($column);
        }
    }
}
