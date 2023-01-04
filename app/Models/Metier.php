<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Entreprise;
use App\Models\Competence;
use App\Models\Specialite;
use App\Models\Emploi;
use App\Models\Stage;
use App\Models\Mission;
class Metier extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'description',

   ];
   public function specialites()
   {
       return $this->belongsToMany(Specialite::class)->withpivot('specialite_id','metier_id');

   }public function assignSpecialite($specialite)
   {
     return  $this->specialites()->save($specialite);
   }


   public function entreprises(){
    return $this->belongsToMany(Entreprise::class);
   }
   public function missions(){
    return $this->belongsToMany(Mission::class);
   }



  /* public function assignEntreprise($entreprise)
   {
     return  $this->entreprises()->save($entreprise);
   }*/
}
