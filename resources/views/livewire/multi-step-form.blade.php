<div>
    <form wire:submit.prevent="registermetier" >
        {{--STEP1 --}}

        @if($currentSteps == 1)
        <div class="step-one">
        <div class="card">
             <div class="card-header bg-secondary text-white ">STEP 1/4</div>
             <div class="card-body">

                    <div class="section-title">
                        <h2> Métier </h2>
                        <br>
                    <div class="col-md-6">
                    <div class="form-group">
                    <input type="text" class="form-control" name="titre" id="titre" placeholder="Nom du Métier"  wire:model="titre" required>
                    <span class="text-danger">@error('titre'){{$message}}@enderror</span>
                    </div>
                    </div>
                </div>





                <div class="section-title">
                    <h2> Définition </h2>
                    <br>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea class="form-control" name="description" rows="5" placeholder="Une petite description " wire:model="description" required></textarea>
                        <span class="text-danger">@error('description'){{$message}}@enderror</span>
                    </div>
                </div>
                </div>


                <div class="section-title">
                    <h2> Mission </h2>
                    <br>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea class="form-control" name="missions" rows="5" placeholder="Mission proposées et prérequis"  wire:model="missions" required></textarea>
                        <span class="text-danger">@error('missions'){{$message}}@enderror</span>
                    </div>
                </div>
                </div>

            </div>
            </div>
             </div>
        @endif


             {{--STEP2--}}
             @if($currentSteps == 2)
             <div class="step-two">
                <div class="card">
                     <div class="card-header bg-secondary text-white ">STEP 2/4</div>
                     <div class="card-body">
                        <div class="section-title">
                            <h2> Competence </h2>
                            <br>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="intitule" id="intitule" placeholder="Competence" wire:model="competence1" required>
                                <span class="text-danger">@error('intitule'){{$message}}@enderror</span>
                            </div>
                        </div>
                         </div>

                         <div class="section-title">
                            <h2> Element Competence </h2>
                            <br>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="intitulee" id="intitulee" placeholder="Element Competence 1"  wire:model="elementcompetence11"  required>
                                <span class="text-danger">@error('intitule'){{$message}}@enderror</span>
                            </div>
                        </div>
                         <br>
                         <br>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="intitulee" id="intitulee" placeholder="Element Competence 2"  wire:model="elementcompetence12"  required>
                                <span class="text-danger">@error('intitule'){{$message}}@enderror</span>
                            </div>
                        </div>

                       <br>
                       <br>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="intitulee" id="intitulee" placeholder="Element Competence 3"  wire:model="elementcompetence13"  required>
                                <span class="text-danger">@error('intitule'){{$message}}@enderror</span>
                            </div>
                        </div>



                         </div>



                        </div>


            </div>
            </div>
        @endif

         {{--STEP4--}}
         @if($currentSteps == 3)
         <div class="step-thrre">
            <div class="card">
                 <div class="card-header bg-secondary text-white ">STEP 3/4</div>
                 <div class="card-body">
                    <div class="section-title">
                        <h2> Competence </h2>
                        <br>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="intitule" id="intitule" placeholder="Competence" wire:model="competence2" required>
                            <span class="text-danger">@error('competence'){{$message}}@enderror</span>
                        </div>
                    </div>
                     </div>

                     <div class="section-title">
                        <h2> Element Competence </h2>
                        <br>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="intitulee" id="intitulee" placeholder="Element Competence 1"  wire:model="elementcompetence21"  required>
                            <span class="text-danger">@error('elementcompetence'){{$message}}@enderror</span>
                        </div>
                    </div>
                     <br>
                     <br>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="intitulee" id="intitulee" placeholder="Element Competence 2"  wire:model="elementcompetence22"  required>
                            <span class="text-danger">@error('intitule'){{$message}}@enderror</span>
                        </div>
                    </div>

                    <br>
                    <br>

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="intitulee" id="intitulee" placeholder="Element Competence 3"  wire:model="elementcompetence23"  required>
                            <span class="text-danger">@error('intitule'){{$message}}@enderror</span>
                        </div>
                    </div>



                     </div>



                    </div>


        </div>
        </div>
        @endif

         {{--STEP4--}}
         @if($currentSteps == 4)
         <div class="step-quatre">
            <div class="card">
                 <div class="card-header bg-secondary text-white ">STEP 4/4</div>
                 <div class="card-body">
                    <div class="section-title">
                        <h2> Competence </h2>
                        <br>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="intitule" id="intitule" placeholder="Competence" wire:model="competence3" required>
                            <span class="text-danger">@error('competence'){{$message}}@enderror</span>
                        </div>
                    </div>
                     </div>

                     <div class="section-title">
                        <h2> Element Competence </h2>
                        <br>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="intitulee" id="intitulee" placeholder="Element Competence 1"  wire:model="elementcompetence31"  required>
                            <span class="text-danger">@error('elementcompetence'){{$message}}@enderror</span>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="intitulee" id="intitulee" placeholder="Element Competence 2"  wire:model="elementcompetence32"  required>
                            <span class="text-danger">@error('elementcompetence'){{$message}}@enderror</span>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="intitulee" id="intitulee" placeholder="Element Competence 3"  wire:model="elementcompetence33"  required>
                            <span class="text-danger">@error('elementcompetence'){{$message}}@enderror</span>
                        </div>
                    </div>



                     </div>



                    </div>


        </div>
        </div>
        @endif


            <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2 ">

                @if ($currentSteps == 1)
                <div></div>
                @endif

                @if ($currentSteps == 2 ||$currentSteps == 3 ||$currentSteps == 4)
                <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Back</button>
                @endif

                @if ($currentSteps == 1 ||$currentSteps == 2 || $currentSteps == 3  )
                <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Next</button>
                @endif

                @if ($currentSteps == 4)
                <button type="submit" class="btn btn-md btn-primary">submit</button>
                @endif

            </div>


         </form>
</div>
