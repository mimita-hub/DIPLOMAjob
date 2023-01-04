@include('adminDash.headerAD')
@include('adminDash.sideBar')
<main id="main" class="main">

    <div class="pagetitle">

      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</a></li>
          <li class="breadcrumb-item active">Entreprise</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <table class="table">
        <thead>
          <tr>

            <th >Nom </th>
            <th >Secteur d'activité</th>
            <th >Adresse mail</th>
            <th >Lieu</th>
            <th>Numéro de Téléphone</th>
          </tr>
            </thead>
            <tbody>

              <tr>
                <td>{{$entreprise->nomEntreprise}}</td>
                <td>{{$entreprise->secteur_entreprise}}</td>
                <td>{{$entreprise->adresse_mail_entreprise	}}</td>
                <td>{{$entreprise->lieu_entreprise}}</td>
                <td>{{$entreprise->téléphone}}</td>

              </tr>
            </tbody>
            </table>
</main>
@include('adminDash.footerAD')
