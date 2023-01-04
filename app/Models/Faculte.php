<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculte extends Model
{

    protected $fillable = [

        'nomFaculte',
        'user_id',
        'universite_id'


     ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function universite()
    {
        return $this->belongsTo(Universite::class);

    }

}
