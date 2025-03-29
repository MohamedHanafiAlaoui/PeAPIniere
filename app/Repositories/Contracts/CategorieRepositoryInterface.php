<?php

namespace App\Repositories\Contracts;

interface CategorieRepositoryInterface
{
    public function createOrUpdate(array $data);
    public function all();
    public function find($id);
}
