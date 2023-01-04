<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Emploi;
use App\Models\Etudiant;
class Postule extends Model
{
    use HasFactory;
    protected $fillable = [

    'cv',
    'nometudiant',
    'nomuniversite',
    'filiere',
    'nomoffre',
    'emploi_id',
    'etudiant_id',




     ];
     public function emploi(){
        return $this->belongsTo(Emploi::class);
    }
    public function etudiant(){
        return $this->belongsTo(Etudiant::class);
    }
}
