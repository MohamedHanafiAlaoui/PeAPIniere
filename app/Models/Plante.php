<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plante extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'slug','categorie_id', 'description'];

    public function categorie() {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function commandes() {
        return $this->hasMany(Commande::class, 'plante_id');
    }

}
