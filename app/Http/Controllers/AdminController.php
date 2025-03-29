<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CategorieRepositoryInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $categorieRepository;

    public function __construct(CategorieRepositoryInterface $categorieRepository)
    {
        $this->categorieRepository = $categorieRepository;
    }

    // إدارة الفئات
    public function manageCategory(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $categorie = $this->categorieRepository->createOrUpdate($request->only(['id', 'nom', 'description']));

        return response()->json($categorie);
    }
}
