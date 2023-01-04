<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remarque extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'user_id',
        'feedback_id',



     ];
     public function feedback()
     {
         return $this->belongsTo(Feedback::class);
     }
     public function user()
     {
         return $this->belongsTo(User::class);
     }
}
