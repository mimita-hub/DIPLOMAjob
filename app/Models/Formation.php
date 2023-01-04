<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
        'filiere_id',



    ];
    public function Filiere()
    {
        return $this->belongsTo(Filiere::class);
    }
}
