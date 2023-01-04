<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
       'date_naissance',
        'sexe',
       'adresse',
        'type',
        'email',
        'password',
        'universite_id'
    ];
    public function Universite()
    {
     return $this->belongsTo(Universite::class);
     }
     public function assignRole($role)
     {
       return  $this->roles()->save($role);
     }


}
