<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Etablissement extends Model
{
    use HasFactory;
    protected $fillable = [

       'adresse',
       'adr_email',
       'description',
       'user_id'


    ];

   /*   public function user()
    {
        return $this->hasMany(User::class);
    }*/
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function Filiere()
    {
        return $this->belongsToMany(Filiere::class);
    }
}
