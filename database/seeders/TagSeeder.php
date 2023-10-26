<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['name' => 'género narrativo'],
            ['name' => 'género lírico'],
            ['name' => 'género dramático'],
            ['name' => 'género didáctico'],
        ];

        DB::table('tags')->insert($tags);
    }
}
