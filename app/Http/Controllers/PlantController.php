<?php

namespace App\Http\Controllers;

use App\Repositories\PlanteRepository;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    protected $planteRepository;

    public function __construct(PlanteRepository $planteRepository)
    {
        $this->planteRepository = $planteRepository;
    }

    public function index()
    {
        return response()->json($this->planteRepository->all());
    }

    public function show($slug)
    {
        $plante = $this->planteRepository->findBySlug($slug);

        if (!$plante) {
            return response()->json(['message' => 'النبتة غير موجودة'], 404);
        }

        return response()->json($plante);
    }
}
