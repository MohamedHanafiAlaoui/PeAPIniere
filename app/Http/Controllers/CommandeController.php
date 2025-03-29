<?php

namespace App\Http\Controllers;

use App\Repositories\CommandeRepository;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    protected $commandeRepository;

    // حقن المستودع في المتحكم
    public function __construct(CommandeRepository $commandeRepository)
    {
        $this->commandeRepository = $commandeRepository;
    }

    // تغيير حالة الطلب إلى "جاهز للتوصيل"
    public function markAsReady($orderId)
    {
        $this->commandeRepository->updateStatus($orderId, 'جاهز للتوصيل');

        return response()->json(['message' => 'تم تحديث حالة الطلب إلى جاهز للتوصيل']);
    }
}
