<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Emploi;
use App\Models\Metier;
use App\Models\Stage;

class Entreprise extends Model
{
    protected $fillable = [
    'user_id',
    'nomEntreprise',
    'secteur_entreprise',
    'description_entreprise',
    'lieu_entreprise',
    'téléphone',
    'adresse_mail_entreprise',


    ];

public function User()
{
 return $this->belongsTo(User::class);
 }

public function metiers(){
    return $this->belongsToMany(Metier::class);
}
public function assignMetier($metier){
    return  $this->metiers()->save($metier);
   }
   public function stages(){
    return $this->hasMany(Stage::class);
}
public function emplois(){
    return $this->hasMany(Emploi::class);
}
}
