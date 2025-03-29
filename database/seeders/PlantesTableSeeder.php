<?php

namespace Database\Seeders;

use App\Models\Plante;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PlantesTableSeeder extends Seeder
{
    public function run(): void
    {
        $plantes = [
            ['nom' => 'Rose', 'categorie_id' => 1, 'description' => 'Belle fleur rouge'],
            ['nom' => 'Menthe', 'categorie_id' => 3, 'description' => 'Plante aromatique très utilisée en cuisine'],
            ['nom' => 'Aloe Vera', 'categorie_id' => 2, 'description' => 'Plante médicinale aux vertus hydratantes'],
        ];

        foreach ($plantes as &$plante) {
            $plante['slug'] = Str::slug($plante['nom']);
        }

        Plante::insert($plantes);
    }
}
