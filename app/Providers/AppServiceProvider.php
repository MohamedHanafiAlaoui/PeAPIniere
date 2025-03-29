<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\CategorieRepositoryInterface;
use App\Repositories\CategorieRepository;
use App\Repositories\Contracts\PlanteRepositoryInterface;
use App\Repositories\PlanteRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CategorieRepositoryInterface::class, CategorieRepository::class);
        $this->app->bind(PlanteRepositoryInterface::class, PlanteRepository::class);
    }

    public function boot()
    {
        //
    }
}
