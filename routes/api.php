<?php

use App\Http\Controllers\PlantController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'api'], function () {

    Route::prefix('auth')->group(function () {
        Route::post('/register', [UserController::class, 'register'])->name('auth.register');
        Route::post('/login', [UserController::class, 'login'])->name('auth.login');
        Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:api')->name('auth.logout');
        Route::post('/refresh', [UserController::class, 'refresh'])->middleware('auth:api')->name('auth.refresh');
        Route::post('/me', [UserController::class, 'me'])->middleware('auth:api')->name('auth.me');
    });

    Route::prefix('plants')->group(function () {
        Route::get('/', [PlantController::class, 'index'])->name('plants.index'); // Liste des plantes
        Route::get('/{slug}', [PlantController::class, 'show'])->name('plants.show'); // Détails d'une plante
    });

    Route::prefix('order')->middleware('auth:api')->group(function () {
        Route::post('/', [PlantController::class, 'createOrder'])->name('order.create'); // Passer une commande
        Route::get('/{id}', [PlantController::class, 'checkOrderStatus'])->name('order.status'); // Vérifier le statut
        Route::delete('/{id}', [PlantController::class, 'cancelOrder'])->name('order.cancel'); // Annuler une commande
        Route::post('/{id}/ready', [CommandeController::class, 'markAsReady'])->name('order.ready'); // Marquer comme prête
    });

    Route::prefix('admin')->middleware('auth:api')->group(function () {
        Route::post('/category', [AdminController::class, 'manageCategory'])->name('admin.category'); // Gérer catégories
        Route::post('/plante', [AdminController::class, 'managePlante'])->name('admin.plante'); // Gérer plantes
        Route::get('/stats', [AdminController::class, 'salesStats'])->name('admin.stats'); // Voir stats de vente
    });

});
