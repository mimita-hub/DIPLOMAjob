<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $fillable = [
       'université',
        'filiere',
        'user_id',
        ];


        public function User()
{
 return $this->belongsTo(User::class);
 }
}


