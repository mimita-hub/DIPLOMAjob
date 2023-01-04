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

                  <form class="row g-3 needs-validation" method="POST"  action="{{route('User.store')}}">
                    @csrf
                    <div class="col-10">
                      <label for="yourName" class="form-label">Nom</label>
                      <input type="text" name="nom" class="form-control" id="yourName" required>

                    </div>
                    <div class="col-10">
                        <label for="yourName" class="form-label">Prenom</label>
                        <input type="text" name="prenom" class="form-control" id="yourName" required>

                      </div>

                    <div class="col-10">
                      <label for="yourEmail" class="form-label">Date De Naissance</label>
                      <input type="date" name="date_naissance" class="form-control" id="yourEmail" required>

                    </div>

                    <div class="col-10">
                        <label for="sexe" class="form-label" >Sexe </label>
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
                        <label for="yourName" class="form-label">Adresse</label>
                        <input type="text" name="adresse" class="form-control" id="yourName" required>

                      </div>
                      <div class="col-10">
                        <label for="yourName" class="form-label">Role</label>
                        <input type="text" name="type" class="form-control" id="yourName" required>

                      </div>
                      <div class="col-10">
                        <label for="yourName" class="form-label">Nom universite</label>
                        <input type="text" name="nom_universite" class="form-control" id="yourName" required>

                      </div>
                      <div class="col-10">
                        <label for="yourName" class="form-label">adresse mail </label>
                        <input type="text" name="adr_mail" class="form-control" id="yourName" required>

                      </div>
                      <div class="col-10">
                        <label for="yourName" class="form-label">Description</label>
                         <textarea class="form-control" name="description" rows="5" placeholder="description" required></textarea>
                        </div>


                      <div class="col-10">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                      </div>

                      <div class="col-10">
                       <label for="password" class="form-label">{{ __('Password') }}</label>
                         <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                         @error('password')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror

                     </div>

                     <div class="col-10">
                        <label for="password-confirm"  class="form-label"> {{ __('Confirm Password') }}</label>
                         <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                     </div>


                    <div class="col-10">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>

                  </form>

                </div>
              </div>
          </div>
        </div>
      </section>


  </main><!-- End #main -->


@include('adminDash.footerAD')

