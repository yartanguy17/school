<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    use HasFactory;
    protected $table = 'etablissements';
    protected $guarded = ['created_at','updated_at'];

    public function type_etablissement () {
        return $this->belongsTo(TypeEtablissement::class , 'type_etablissement_id');
    }

    public function zone () {
        return $this->belongsTo(Zone::class , 'zones_id');
    }

    public function categorie () {
        return $this->belongsTo(Categorie::class , 'categories_id');
    }
}
