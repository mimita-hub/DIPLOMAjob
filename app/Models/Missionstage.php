<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stage;
class Missionstage extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
    ];
    public function stages(){
        return $this->belongsToMany(Stage::class);
       }
       public function assignStage($stage)
       {
         return  $this->stages()->save($stage);
       }
}
