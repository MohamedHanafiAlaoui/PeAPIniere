<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = ['plante_id', 'id_client', 'id_employe', 'quantite', 'status'];

    public function plante() {
        return $this->belongsTo(Plante::class, 'plante_id');
    }

    public function client() {
        return $this->belongsTo(User::class, 'id_client');
    }

    public function employe() {
        return $this->belongsTo(User::class, 'id_employe');
    }

}
