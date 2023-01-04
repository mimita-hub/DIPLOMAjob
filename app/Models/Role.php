<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded=[];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }

    // donner permission au role

    public function allowTo($permission)
    {
        return $this->permissions()->save($permission);
    }
}
