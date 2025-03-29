<?php

namespace App\Repositories;

use App\Models\Commande;

class CommandeRepository
{
    // إنشاء طلب جديد
    public function create(array $data)
    {
        return Commande::create($data);
    }

    // البحث عن طلب باستخدام معرفه
    public function findById($id)
    {
        return Commande::findOrFail($id);
    }

    // تحديث حالة الطلب
    public function updateStatus($id, $status)
    {
        $commande = Commande::findOrFail($id);
        $commande->status = $status;
        $commande->save();

        return $commande;
    }

    // جلب إحصائيات المبيعات
    public function getSalesStats()
    {
        return Commande::selectRaw('plante_id, count(*) as total_sales')
            ->groupBy('plante_id')
            ->orderByDesc('total_sales')
            ->get();
    }
}
