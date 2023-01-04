<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Missionstage;
use App\Models\Profilstage;
use App\Models\Entreprise;
use App\Models\Metier;
use App\Models\Postulestage;
class Stage extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomstage',
        'nomentreprise',
        'nommetier',
        'secteurdactivite',
        'nombrepost',
        'niveaupost',
        'niveaudétude',
        'lieu',
         'periode',
        'entreprise_id',

    ];
    public function missionstages(){
        return $this->belongsToMany(Missionstage::class);
       }

       public function profilstages(){
        return $this->belongsToMany(Profilstage::class);
       }
       public function entreprise(){
        return $this->belongsTo(Entreprise::class);
    }

    public function postulestages(){
        return $this->hasMany(Postulestage::class);
    }
}
