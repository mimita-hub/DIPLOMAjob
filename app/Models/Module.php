<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'titre',
        'coeff',
        'credit',
        'C',
        'TD',
        'TP',
        'unite',
        'user_id',
        'vsh',
        'specialite_id'




    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function Specialite()
    {
        return $this->belongsTo(Specialite::class);
    }

    public function elementcompetences(){
        return $this->belongsToMany(ElementCompetence::class);
    }
    public function assignElement($element)
   {
     return  $this->elementcompetences()->save($element);
   }

   public function prerequis()

   {
    return $this->hasMany(Prerequi::class);

   }

}
