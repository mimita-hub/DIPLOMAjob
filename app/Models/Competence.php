<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Mission;
use App\Models\Elementcompetence;

class Competence extends Model
{
    use HasFactory;
    protected $fillable = [
    'intitule',
    'code',

];

public function missions(){
    return $this->belongsToMany(Mission::class);
   }
   public function assignMission($mission)
   {
     return  $this->missions()->save($mission);
   }
public function elementcompetences(){
    return $this->hasMany(Elementcompetence::class);
}
}
