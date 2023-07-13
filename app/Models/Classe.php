<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $table = 'classes';
    protected $guarded = ['created_at','updated_at'];

    public function etablissement () {
        return $this->belongsTo(Etablissement::class , 'etablissement_id');
    }
}
