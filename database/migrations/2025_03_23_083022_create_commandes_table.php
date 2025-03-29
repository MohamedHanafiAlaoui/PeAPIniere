<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plante_id')->constrained('plantes')->onDelete('cascade');
            $table->foreignId('id_client')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_employe')->nullable()->constrained('users')->onDelete('set null');
            $table->integer('quantite');
            $table->enum('status', ['en attente', 'en préparation', 'livrée'])->default('en attente');
            $table->timestamp('date_commande')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
