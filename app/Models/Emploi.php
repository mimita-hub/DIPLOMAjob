<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Metier;
use App\Models\Entreprise;
use App\Models\Missionemploi;
use App\Models\Competenceemploi;
use App\Models\Etudiant;
use App\Models\Postule;
class Emploi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nompost',
        'nomentreprise',
        'nommetier',
        'secteurdactivite',
        'nombrepost',
        'niveaupost',
        'experiencedemandée',
        'niveaudétude',
        'typecontrat',
        'lieu',
        'datedexpiration',
        'entreprise_id',
       
    ];

    public function entreprise(){
        return $this->belongsTo(Entreprise::class);
    }
  
    public function missionemplois(){
        return $this->belongsToMany(Missionemploi::class);
       }
       public function  competenceemplois(){
        return $this->belongsToMany(Competenceemploi::class);
       }
       public function postules(){
        return $this->hasMany(Postule::class);
    }


}
