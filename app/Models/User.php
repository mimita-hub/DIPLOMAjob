<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeUserMail;
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
       'date_naissance',
        'sexe',
       'adresse',
        'type',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


   protected  static function boot()
   {
    parent::boot();
    static::created( function($user)

    {

            $email=$user->pluck('email')->first();
            Mail::to($user->email)->send(new WelcomeUserMail());

    });
   }


    public function Etablissements()
    {
     return $this->belongsTo(Etablissementr::class);
     }

     //::::::::many to many avec user ::://
     public function roles()
    {
     return $this->belongsToMany(Role::class)->withTimestamps();;
     }
     public function entreprises()
     {
      return $this->belongsToMany(Entreprise::class)->withTimestamps();
      }
      public function universites()
      {
       return $this->belongsToMany(Universite::class)->withTimestamps();
       }
       public function departements()
       {
        return $this->belongsToMany(Departement::class)->withTimestamps();
        }
      public function etudiants()
      {
       return $this->belongsToMany(Etudiant::class)->withTimestamps();;
       }

     //:::::::::::::: donner un role au user
     // $user->roles()->save(role)

     public function assignRole($role)
     {
       return  $this->roles()->save($role);
     }

  public function permissions()
  {
      return $this->roles->map->permissions->flatten()->pluck('permission')->unique();
  }


}
