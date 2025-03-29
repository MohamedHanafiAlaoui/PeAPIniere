<?php

namespace Database\Seeders;

use App\Models\Commande;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommandesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Commande::insert([
            ['plante_id' => 1, 'id_client' => 2, 'id_employe' => 5, 'quantite' => 2, 'status' => 'en attente'],
            ['plante_id' => 2, 'id_client' => 3, 'id_employe' => 6, 'quantite' => 5, 'status' => 'en préparation'],
            ['plante_id' => 3, 'id_client' => 4, 'id_employe' => null, 'quantite' => 1, 'status' => 'livrée'],
        ]);
    }
}
