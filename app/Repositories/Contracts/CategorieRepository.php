<?php

namespace App\Repositories;

use App\Models\Categorie;
use App\Repositories\Contracts\CategorieRepositoryInterface;

class CategorieRepository implements CategorieRepositoryInterface
{
    public function createOrUpdate(array $data)
    {
        return Categorie::updateOrCreate(
            ['id' => $data['id'] ?? null],
            $data
        );
    }

    public function all()
    {
        return Categorie::all();
    }

    public function find($id)
    {
        return Categorie::findOrFail($id);
    }
}
