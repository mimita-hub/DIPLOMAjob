<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulestage extends Model
{
    use HasFactory;
    protected $fillable = [

        'cv',
        'nometudiant',
        'nomuniversite',
        'filiere',
        'nomoffre',
        'stage_id',
        'etudiant_id',




         ];
         public function stage(){
            return $this->belongsTo(Stage::class);
        }
        public function etudiant(){
            return $this->belongsTo(Etudiant::class);
        }
}
