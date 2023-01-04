@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>gestion membres</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</a></li>
          <li class="breadcrumb-item active">Membres</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Créer un membre </h5>

                  </div>

                  <form class="row g-3 needs-validation" method="POST"  action="{{route('membres_store',['id'=>$data])}}">
                    @csrf
                    <div class="col-10">
                        <input placeholder="Nom" type="text" name="nom" class="form-control"  required>

                    </div>
                    <div class="col-10">
                        <input placeholder="Prénom" type="text" name="prenom" class="form-control"  required>
                      </div>

                    <div class="col-10">
                      <input type="date" name="date_naissance" class="form-control" id="yourEmail" required>
                    </div>
                    <div class="col-10">
                        <label for="sexe" >Sexe </label>
                        <div class="form-radio-item">
                            <input type="radio" name="sexe" id="homme"  value="homme"checked>
                            <label for="homme">Homme</label>
                            <span class="check" value="homme"></span>
                        </div>
                        <div class="form-radio-item">
                            <input type="radio" name="sexe"  value="femme" id="femme">
                            <label for="femme" >Femme</label>
                            <span class="check" value="femme"></span>
                       </div>
                    </div>
                       <div class="col-10">
                        <input  placeholder="Adresse"type="text" name="adresse" class="form-control" required>
                      </div>
                     <div class="col-10">
                                <select aria-placeholder="Role" name="type"  class="form-control" id="type"  size="1"  onChange="THEFUNCTION(this.selectedIndex); " required>
                                    <option> Role </option>
                                    @if (Auth::user()->type=="univAdmin")
                                    <option value="respFaculte">Responsable Faculte </option>
                                    @endif
                                    @if (Auth::user()->type=="respFaculte")
                                    <option  value="respDepartement">Responsable Departement</option>
                                    @endif
                                    @if (Auth::user()->type=="respDepartement")
                                    <option value="respSpecialite">Responsable Spécialité</option>
                                    @endif
                                    </select>
                            </div>
                            @if (Auth::user()->type=="univAdmin")
                            <div  class="col-10" id="nomFaculte">
                                  <input placeholder="Nom Faculté" type="text" name="nomFaculte"  class="form-control" required/>
                            </div>
                            @endif
                            @if (Auth::user()->type=="respFaculte")
                            <div  class="col-10" id="nomDepartement">
                                  <input placeholder="Nom Departement" type="text" name="nomDepartement"  class="form-control" required/>
                            </div>
                              @endif
                              @if (Auth::user()->type=="respDepartement")

                            <div  class="col-10"  id="nomSpecialite">
                                 <input placeholder="Spécialité Master" type="text" name="nomSpecialite"  class="form-control" required/>
                            </div>
                               @endif


                      <div class="col-10">
                         <input placeholder="Adresse Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                      </div>

                      <div class="col-10">
                         <input placeholder="Mot de passe" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                         @error('password')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror

                     </div>

                     <div class="col-10">
                          <input placeholder="Confirmez votre mot de passe" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                     </div>
                    <br>


                    <div class="col-10">
                      <button class="btn btn-primary w-100" type="submit">Créer Compte</button>
                    </div>

                  </form>

                </div>
              </div>
          </div>
        </div>
      </section>


  </main><!-- End #main -->


@include('adminDash.footerAD')

