<?php

namespace App\Repositories\Contracts;

interface PlanteRepositoryInterface
{
    public function createOrUpdate(array $data);
    public function all();
    public function findBySlug($slug);
}
