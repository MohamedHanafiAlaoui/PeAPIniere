<?php

namespace App\Repositories;

use App\Models\Plante;
use App\Repositories\Contracts\PlanteRepositoryInterface;

class PlanteRepository implements PlanteRepositoryInterface
{
    public function createOrUpdate(array $data)
    {
        return Plante::updateOrCreate(
            ['id' => $data['id'] ?? null],
            $data
        );
    }

    public function all()
    {
        return Plante::with('categorie')->get();
    }

    public function findBySlug($slug)
    {
        return Plante::where('slug', $slug)->first();
    }
}
