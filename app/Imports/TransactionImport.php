<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Role;
use App\Models\Departement;
use App\Models\Specialite;
use App\Models\Faculte;
use App\Models\Universite;
use Auth;
use Alert;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransactionImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {      $userId=Auth::id();
        if(Auth::user()->type=="univAdmin")
        {$univ=Universite::where('user_id',$userId )->get();
            $dataUniv=Universite::where('id',$univ->pluck('id') )->get();
           foreach( $dataUniv as  $dataUniv)
           {
           }
         $data= $dataUniv->id;
        }
       elseif(Auth::user()->type=="respFaculte")
        {
            $fac=Faculte::where('user_id',$userId )->get();
           $dataFac=Faculte::where('id',$fac->pluck('id') )->get();
          foreach($dataFac as $dataFac)
          {
          }
        $data=$dataFac->id;

        }elseif((Auth::user()->type=="respDepartement"))

      {   $fac=Departement::where('user_id',$userId )->get();
        $dataFac=Departement::where('id',$fac->pluck('id') )->get();
       foreach($dataFac as $dataFac)
       {
       }
     $data=$dataFac->id;

    }


        $user= User::create([
            'nom' =>$row['nom'],
            'prenom' =>$row['prenom'],
            'date_naissance' =>$row['date_naissance'],
            'sexe' =>$row['sexe'],
            'adresse' =>$row['adresse'],
            'type' =>$row[ 'type'],
            'email' =>$row['email'],
            'password' =>Hash::make($row['password']),

        ]);
      $type="respSpecialite";
        if( $row['type']=="respFaculte")
        {
            $type="respFaculte";
            $fac=Faculte::create([
                'nomFaculte'=> $row['faculte'],
                'user_id'=>  $user->id,
                'universite_id'=>$data,

            ]);

        }
       elseif( $row['type']=="respDepartement") {



            $type="respDepartement";
           Departement::create([

            'nomDepartement'=> $row['departement'],
            'user_id'=>   $user->id,
            'faculte_id'=>$data,
                    ]);
        }else
          {

            $type="respSpecialite" ;
            $spec=Specialite::create([
                'nomSpecialite' =>$row['specialite'],
                'user_id' => $user->id ?? NULL,
                'departement_id' =>$data,


            ]);


        }

        $role = Role::where('role',$type)->first();
        $user->assignRole($role);


    }
    }


