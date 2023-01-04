<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Emploi;
class Competenceemploi extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
    ];
    public function emplois(){
        return $this->belongsToMany(Emploi::class);
       }
       public function assignEmploi($emploi)
    {
      return  $this->emplois()->save($emploi);
    }
}
