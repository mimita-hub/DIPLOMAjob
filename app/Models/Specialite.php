<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    use HasFactory;


    protected $fillable = [

        'nomSpecialite',
        'description',
        'objectifs',
        'prerequis',
        'secteurs',
        'user_id',
        'departement_id',

     ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
    public function modules()
    {
        return $this->belongsToMany(Module::class);
    }
    public function metiers(){
        return $this->belongsToMany(Metier::class);
    }
    public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }








}
