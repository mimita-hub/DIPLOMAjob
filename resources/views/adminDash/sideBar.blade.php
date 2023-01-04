<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        @if (Auth::user()->type !=("etudiant"))
      <li class="nav-item">
        <a class="nav-link " href="{{route('dash')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      @endif

 {{--  ----------------- -----------------------------Etudiant------------------------------ ----------------------------------------------------------------------}}
 @if (Auth::user()->type==("etudiant"))

<li class="nav-item">
        <a  class="nav-link collapsed" href="{{route('etudiantFeed')}}" class="btn btn-color-99CC5B "role="button" class="btn"> <i class="bi bi-chat-left-dots"></i>
            <span class="text-color-99CC5B">feedbacks</span>
          </a>
      </li>
      @endif
 {{--  ----------------- -----------------------------Université------------------------------ ----------------------------------------------------------------------}}


      @if (Auth::user()->type==("univAdmin" ))
            <li class="nav-item">
                <a   class="nav-link collapsed" href="{{route('Universite.index')}}"  role="button" class="btn">
                  <i class="bi bi-bank"></i><span>Universite</span>
                </a>
              </li>
            <li class="nav-item">
                <a   class="nav-link collapsed" href="{{route('membres_create',['id'=>Auth::id()])}}" role="button" class="btn">
              <i class="bi bi-plus"></i>Créer Un Compte<span></span>
            </a>
          </li>
          <li class="nav-item">
            <a   class="nav-link collapsed" href="{{route('membres_import',['id'=>Auth::id()])}}" role="button" class="btn">
          <i class="bi bi-box-arrow-down"></i>Importer des Utlisateurs <span></span>
        </a>
      </li>
         {{-- <li class="nav-item">
            <a   class="nav-link collapsed" href="{{route('membres.index')}}"  role="button" class="btn">
              <i class="bi bi-person"></i><span>Liste Membres </span>
            </a>
          </li>--}}
          <li class="nav-item">
            <a   class="nav-link collapsed" href="{{route('facultes.index')}}"  role="button" class="btn">
              <i class="bi bi-building"></i><span>Liste Des Facultés</span>
            </a>
          </li>
          <li class="nav-item">
            <a   class="nav-link collapsed" href="{{route('departement.index')}}"  role="button" class="btn">
              <i class="bi bi-building"></i><span>Liste Des Departements</span>
            </a>
          </li>
          <li class="nav-item">
            <a   class="nav-link collapsed" href="{{route('liste')}}"  role="button" class="btn">
              <i class="bi bi-building"></i><span>Liste Des Spécialités</span>
            </a>
          </li>

      <li class="nav-item">
        <a  class="nav-link collapsed" href="{{route('feedbacks.index')}}" class="btn btn-color-99CC5B "role="button" class="btn"> <i class="bi bi-chat-left-dots"></i>
            <span class="text-color-99CC5B">feedbacks</span>
          </a>
      </li>


      </div>
    {{-- <li class="nav-item">
        <a  class="nav-link collapsed" href="{{route('User.index')}}" class="btn btn-color-99CC5B "role="button" class="btn"><i class="bi bi-gear-wide"></i>
            <span class="text-color-99CC5B">Configuration</span>
          </a>
      </li><!-- End Components Nav -->--}}
      @endif
      <!-- End Profile Page Nav -->


 {{--  ----------------- ----------------------------- RESPONSABLE RH ---------------------------}}
      @if (Auth::user()->type==("responsable_rh"))
      <li class="nav-item">
        <a  class="nav-link collapsed" href="{{route('entreprise_dash')}}" class="btn btn-color-99CC5B "role="button" class="btn">  <i class="bi bi-building"></i>
            <span class="text-color-99CC5B">Entreprises</span>
          </a>
      </li>
      <li class="nav-item">
        <a  class="nav-link collapsed" href="{{route('app_listemetier')}}" class="btn btn-color-99CC5B "role="button" class="btn">  <i class="bi bi-award-fill"></i>
            <span class="text-color-99CC5B"> Métier</span>
          </a>
      </li>
      <li class="nav-item">
        <a  class="nav-link collapsed" href="{{route('app_listeemploi')}}" class="btn btn-color-99CC5B "role="button" class="btn">  <i class="bi bi-briefcase-fill"></i>
            <span class="text-color-99CC5B"> Emploi</span>
          </a>
      </li>
      <li class="nav-item">
        <a  class="nav-link collapsed" href="{{route('app_listestage')}}" class="btn btn-color-99CC5B "role="button" class="btn">  <i class="bi bi-mortarboard-fill"></i>
            <span class="text-color-99CC5B"> Stage</span>
          </a>
      </li>
      <li class="nav-item">
        <a   class="nav-link collapsed" href="{{route('app_listecandidature')}}"  role="button" class="btn">
          <i class="bi bi-person"></i><span>Liste Candidatures</span>
        </a>
      </li>
      <li class="nav-item">
        <a  class="nav-link collapsed" href="{{route('entrepriseFeed')}}" class="btn btn-color-99CC5B "role="button" class="btn"> <i class="bi bi-chat-left-dots"></i>
            <span class="text-color-99CC5B">feedbacks</span>
          </a>
      </li>
      <!-- End Profile Page Nav -->
     @endif



{{--  ----------------- -----------------------------Faculte------------------------------ ----------------------------------------------------------------------}}


     @if (Auth::user()->type==("respFaculte"))
     <li class="nav-item">
        <a   class="nav-link collapsed" href="{{route('facultes.index')}}"  role="button" class="btn">
          <i class="bi bi-bank"></i><span>Faculté</span>
        </a>
      </li>
      <li class="nav-item">
        <a   class="nav-link collapsed" href="{{route('membres_create',['id'=>Auth::id()])}}"  role="button" class="btn">
      <i class="bi bi-plus"></i>Créer Un Compte<span></span>
    </a>
</li>
<li class="nav-item">
    <a   class="nav-link collapsed" href="{{route('membres_import',['id'=>Auth::id()])}}" role="button" class="btn">
  <i class="bi bi-box-arrow-down"></i>Importer des Utlisateurs <span></span>
</a>
</li>
<li class="nav-item">
    <a   class="nav-link collapsed" href="{{route('departement.index')}}"  role="button" class="btn">
      <i class="bi bi-building"></i><span>Liste Des Departements</span>
    </a>
  </li>
  <li class="nav-item">
    <a   class="nav-link collapsed" href="{{route('liste')}}"  role="button" class="btn">
      <i class="bi bi-building"></i><span>Liste Des Spécialités</span>
    </a>
  </li>
     @endif


 {{--  ----------------- -----------------------------DEpartement------------------------------ ----------------------------------------------------------------------}}
     @if (Auth::user()->type==("respDepartement"))
     <li class="nav-item">
        <a   class="nav-link collapsed" href="{{route('departement.index')}}"  role="button" class="btn">
          <i class="bi bi-bank"></i><span>Departement</span>
        </a>
      </li>
      <li class="nav-item">
        <a   class="nav-link collapsed" href="{{route('membres_create',['id'=>Auth::id()])}}"  role="button" class="btn">
      <i class="bi bi-plus"></i>Créer Un Compte<span></span>
       </a>
     </li>
     <li class="nav-item">
        <a   class="nav-link collapsed" href="{{route('membres_import',['id'=>Auth::id()])}}" role="button" class="btn">
      <i class="bi bi-box-arrow-down"></i>Importer des Utlisateurs <span></span>
    </a>
  </li>

      <li class="nav-item">
        <a   class="nav-link collapsed" href="{{route('liste')}}"  role="button" class="btn">
          <i class="bi bi-person"></i><span>Liste Spécialtés</span>
        </a>
      </li>
      <li class="nav-item">
        <a  class="nav-link collapsed" href="{{route('feedbacks.index')}}" class="btn btn-color-99CC5B "role="button" class="btn"> <i class="bi bi-chat-left-dots"></i>
            <span class="text-color-99CC5B">feedbacks</span>
          </a>
      </li>


@endif

{{--  ----------------- ----------------------------Specialite------------------------------ ----------------------------------------------------------------------}}



@if (Auth::user()->type==("respSpecialite"))
<li class="nav-heading">Création de formation </li>
<li class="nav-item">

    <a   class="nav-link collapsed" href="{{route('metiersSpec')}}"  role="button" class="btn">
        <i class="bi bi-folder-plus"></i>  <span> Métiers</span>
    </a>


</li>
<li class="nav-item">

            <a   class="nav-link collapsed" href="{{route('specialites.index')}}"  role="button" class="btn">
                <i class="bi bi-folder-plus"></i>  <span> Specialité</span>
            </a>


</li>
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#module-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-file-earmark-plus"></i><span>Modules</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="module-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li class="nav-item">
            <a   class="nav-link collapsed" href="{{route('moduls_create',['id'=>Auth::id()])}}"  role="button" class="btn">
            <i class="bi bi-circle"></i><span>Ajouter Module</span>
            </a>
            </li>
           <li>
                <a href="{{route('moduls.index')}}">
                  <i class="bi bi-circle"></i><span>Liste des Modules</span>
                </a>
              </li>
        {{--   <li>
            <a href="{{route('index_module',['id'=>1])}}">
              <i class="bi bi-circle"></i><span>Modules/Semestre 1</span>
            </a>
          </li>
          <li>
            <a href="{{route('index_module',['id'=>2])}}">
              <i class="bi bi-circle"></i><span>Modules/Semestre 2</span>
            </a>
          </li>
          <li>
            <a href="{{route('index_module',['id'=>3])}}">
              <i class="bi bi-circle"></i><span>Modules/Semestre 3</span>
            </a>
          </li>
          <li>
            <a href="{{route('index_module',['id'=>4])}}">
              <i class="bi bi-circle"></i><span>Semestre 4</span>
            </a>
          </li>
--}}
    </ul>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#Prérequis-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-plus-circle-dotted"></i><span>Prérequis</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="Prérequis-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li class="nav-item">
            <a   class="nav-link collapsed" href="{{route('prerequis.index')}}"  role="button" class="btn">
            <i class="bi bi-circle"></i><span>Prérequis Des Modules</span>
            </a>
            </li>

    </ul>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#semestre-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-plus-square"></i><span>Programmation des semestres</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="semestre-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li class="nav-item">
            <a   class="nav-link collapsed" href="{{route('semestres.create')}}"  role="button" class="btn">
            <i class="bi bi-circle"></i><span>Ajouter Semestre </span>
            </a>
            </li>

        <li class="nav-item">
            <a   class="nav-link collapsed" href="{{route('semestres.index')}}"  role="button" class="btn">
                <i class="bi bi-card-list"></i> <span> Liste Des Semestres</span>
            </a>
          </li>
            <li class="nav-item">
            <a   class="nav-link collapsed" href="{{route('semestres.afficher')}}"  role="button" class="btn">
            <i class="bi bi-circle"></i><span>Programme semestriel</span>
            </a>
            </li>

      </ul>

</li>
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#f-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-check-circle"></i>Valider la formation<span></span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="f-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li class="nav-item">
            <a   class="nav-link collapsed" href="{{route('formation_module')}}"  role="button" class="btn">
                <i class="bi bi-circle"></i>Ma Formation<span></span>
         </a>
        <li class="nav-item">
            <a   class="nav-link collapsed" href="{{route('validerFormation')}}"  role="button" class="btn">
          <i class="bi bi-circle"></i>Valider la formation<span></span>
         </a>
         </li>


 </li>

    </ul>
</li>

 <li class="nav-heading">Consulter Les Feedbacks  </li>
 <li class="nav-item">
    <a  class="nav-link collapsed" href="{{route('feedbacks.index')}}" class="btn btn-color-99CC5B "role="button" class="btn"> <i class="bi bi-chat-left-dots"></i>
        <span class="text-color-99CC5B">feedbacks</span>
      </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#feed" data-bs-toggle="collapse" href="#">
    <i class="bi bi-clipboard-check"></i></i><span>Rapports</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="feed" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li class="nav-item">
            <a   class="nav-link collapsed" href="{{route('remarques.index')}}"  role="button" class="btn">
                <i class="bi bi-circle"></i>  <span> liste des remarques</span>
            </a>
          </li>
            <li class="nav-item">
            <a   class="nav-link collapsed" href="{{route('rapport')}}"  role="button" class="btn">
            <i class="bi bi-circle"></i><span>Mon Rapport</span>
            </a>
            </li>
      </ul>
</li>

@endif
    </ul>

  </aside><!-- End Sidebar-->
