<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'module_id',
        'specialite_id'



      ];
      public function Module()
      {
          return $this->belongsTo(Module::class);
      }  public function Specialite()
      {
          return $this->belongsTo(Specialite::class);
      }
}
