<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Departement extends Model
{
    use HasFactory;

    protected $fillable = [

        'nomDepartement',
        'user_id',
        'faculte_id',

     ];


     public function user()
     {
         return $this->belongsTo(User::class);
     }
     public function faculte()
     {
         return $this->belongsTo(Faculte::class);
     }
    public function specialites()
    {
        return $this->hasMany(Specialite::class);
    }

}
