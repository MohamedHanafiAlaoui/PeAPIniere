<?php

namespace App\Repositories;

use App\Models\Categorie;

class CategorieRepository
{
    // إنشاء أو تحديث فئة (Catégorie)
    public function createOrUpdate(array $data)
    {
        return Categorie::updateOrCreate(
            ['id' => $data['id'] ?? null],
            $data
        );
    }

    // جلب جميع الفئات
    public function all()
    {
        return Categorie::all();
    }

    // البحث عن فئة باستخدام معرفها (ID)
    public function find($id)
    {
        return Categorie::findOrFail($id);
    }
}
