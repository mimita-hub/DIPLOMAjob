<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Competence;
use App\Models\Module;
class Elementcompetence extends Model
{
    use HasFactory;

    protected $fillable = [
        'intitule',
        'code',
        'objectif',
        'niveau',
        'competence_id',

    ];
    public function competence(){
        return $this->belongsTo(Competence::class);
    }
    public function modules(){
        return $this->belongsToMany(Module::class);
    }
}
