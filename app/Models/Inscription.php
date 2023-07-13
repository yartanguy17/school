<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;
    protected $table = 'inscriptions';
    protected $guarded = ['created_at','updated_at'];

    public function etudiant () {
        return $this->belongsTo(Etudiant::class , 'etudiant_id');
    }

    public function filliere () {
        return $this->belongsTo(Filiere::class , 'filliere_id');
    }

    public function annneScolaire () {
        return $this->belongsTo(AnneeScolaire::class , 'annee_scolaire_id');
    }
}
