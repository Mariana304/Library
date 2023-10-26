<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Categoría 1'],
            ['name' => 'Categoría 2'],
            ['name' => 'Categoría 3'],
            ['name' => 'Categoría 4'],
            ['name' => 'Categoría 5'],
        ];

        DB::table('categories')->insert($categories);
    }
}
