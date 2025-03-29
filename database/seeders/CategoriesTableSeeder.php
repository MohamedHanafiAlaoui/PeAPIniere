<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categorie::insert([
            ['nom' => 'Fleurs'],
            ['nom' => 'Médicinales'],
            ['nom' => 'Aromatiques'],
        ]);
    }
}
