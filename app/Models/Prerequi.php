<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prerequi extends Model
{
    use HasFactory;
    protected $fillable = [
       'prerequis',
       'module_id'


     ];
     public function Module()
     {
         return $this->belongsTo(Module::class);
     }


}
