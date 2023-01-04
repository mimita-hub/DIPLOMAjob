<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    public $table = "feedbacks";
    protected $fillable = [
       'commentaire',
        'rating',
       'user_id',
       'specialite_id',
       'competence_id',
       'elementcompetence_id',



    ];
    public function specialite()
    {
        return $this->belongsTo(Specialite::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
