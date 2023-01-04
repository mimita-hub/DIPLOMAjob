<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universite extends Model
{
    use HasFactory;
    protected $fillable = [

        'nom_universite',
        'adr_mail',
        'description',
        'user_id'


     ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function filieres()
    {
        return $this->belongsToMany(Filiere::class)->withTimestamps();

    }
    public function facultes()
    {
        return $this->hasMany(Faculte::class);
    }



}
