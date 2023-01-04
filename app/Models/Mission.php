<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Metier;
use App\Models\Competence;
class Mission extends Model
{
    use HasFactory;
    protected $fillable = [

        'description',

   ];
    public function metiers(){
        return $this->belongsToMany(Metier::class);
    }
    public function assignMetier($metier)
    {
      return  $this->metiers()->save($metier);
    }
    public function competences(){
        return $this->belongsToMany(Competence::class);
       }
}
