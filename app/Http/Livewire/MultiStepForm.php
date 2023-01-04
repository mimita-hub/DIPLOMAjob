<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Metier;
use App\Models\Competence;
use App\Models\Elementcompetence;
use App\Models\Entreprise;
use Auth;

class MultiStepForm extends Component
{
    use WithFileUploads;
    public $titre;
    public $description;
    public $missions;
    public $elementcompetence11;
    public $elementcompetence12;
    public $elementcompetence13;
    public $competence1;
    public $elementcompetence21;
    public $elementcompetence22;
    public $elementcompetence23;
    public $competence2;
    public $elementcompetence31;
    public $elementcompetence32;
    public $elementcompetence33;
    public $competence3;
    public $totalSteps = 4;
    public $currentSteps = 1;

    public function mount(){
        $this->currentSteps =1;
    }

    public function render()
    {
        return view('livewire.multi-step-form');
    }

    public function validateData(){
        if($this->currentSteps ==1){
            $this->validate([
            'titre'=>'required',
            'description'=>'required',
            'missions'=>'required',


            ]) ;

        }elseif($this->currentSteps ==2){
            $this->validate([
            'competence1'=>'required',
            'elementcompetence11'=>'required',
            'elementcompetence12'=>'required',
            'elementcompetence13'=>'required',
            ]);
        }
      elseif($this->currentSteps ==3){
        $this->validate([
        'competence2'=>'required',
        'elementcompetence21'=>'required',
        'elementcompetence22'=>'required',
        'elementcompetence23'=>'required',
        ]);
    }


    }
    public function increaseStep(){
        $this->resetErrorBag();
        $this->validateData();
        $this->currentSteps++;
        if( $this->currentSteps >$this->totalSteps){
            $this->currentSteps=$this->totalSteps;
        }
    }

    public function decreaseStep(){
        $this->resetErrorBag();
        $this->currentSteps--;
        if( $this->currentSteps <1){
            $this->currentSteps=1;
        }
    }
    public function registermetier(){
        $this->resetErrorBag();
        if($this->currentSteps ==4){
            $this->validate([
                'competence3'=>'required',
                'elementcompetence31'=>'required',
                'elementcompetence32'=>'required',
                'elementcompetence33'=>'required',
            ]) ;


    }
   $data=Competence::all();
     $code= 0;
    $last_data=collect($data)->last();
    if($last_data==null){
        $code=1;
    }else{
       $code=(string)$last_data->id+1;
    }
    $metier=Metier ::create([
        "titre"=> $this->titre,
        "description" => $this->description,
        "missions"=> $this->missions,
     ]);
    $comp1=Competence::create([
        "intitule" =>$this->competence1,
        "code" =>"C".$code,
     ]);


     $comp2=Competence::create([
        "intitule" =>$this->competence2,
        "code" =>"C".(string)$comp1->id+1,
     ]);


     $comp3=Competence::create([
        "intitule" =>$this->competence3,
        "code" =>"C".(string)$comp2->id+1,
     ]);
     $compx=1;
    $elem11=Elementcompetence::create([
        "intitule" =>$this->elementcompetence11,
        "code" => $comp1->code.".".(string)$compx,
        "competence_id" => $comp1->id ,
    ]);
    $elem12=Elementcompetence::create([
        "intitule" =>$this->elementcompetence12,
        "code" => $comp1->code.".".(string)$compx+1,
        "competence_id" => $comp1->id ,
    ]);
    $elem13=Elementcompetence::create([
        "intitule" =>$this->elementcompetence13,
        "code" =>$comp1->code.".".(string)$compx+2,
        "competence_id" => $comp1->id ,
    ]);
    $elem21=Elementcompetence::create([
        "intitule" =>$this->elementcompetence21,
        "code" => $comp2->code.".".(string)$compx,
        "competence_id" => $comp2->id ,
    ]);
    $elem22=Elementcompetence::create([
        "intitule" =>$this->elementcompetence22,
        "code" => $comp2->code.".".(string)$compx+1,
        "competence_id" => $comp2->id ,
    ]);
    $elem23=Elementcompetence::create([
        "intitule" =>$this->elementcompetence23,
        "code" => $comp2->code.".".(string)$compx+2,
        "competence_id" => $comp2->id ,
    ]);
    $elem31=Elementcompetence::create([
        "intitule" =>$this->elementcompetence31,
        "code" => $comp3->code.".".(string)$compx,
        "competence_id" => $comp3->id ,
    ]);
    $elem32= Elementcompetence::create([
        "intitule" =>$this->elementcompetence32,
        "code" => $comp3->code.".".(string)$compx+1,
        "competence_id" => $comp3->id ,
    ]);
    $elem33=Elementcompetence::create([
        "intitule" =>$this->elementcompetence33,
        "code" =>$comp3->code.".".(string)$compx+2,
        "competence_id" => $comp3->id ,
    ]);
    $comp1->assignMetier($metier);
    $comp2->assignMetier($metier);
    $comp3->assignMetier($metier);
    $identrep=Auth::id();
    $entreprise = Entreprise::where('user_id',$identrep)->first();

    //$metier->assignEntreprise($entreprise);

    $this ->reset();
    //$this->currentSteps=1;
   return redirect()->route('app_metier');

}

}
