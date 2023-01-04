@include('home.head')

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-center ">
        <h2 >Création d'une Université </h2>

      </div>

    </div>
  </section><!-- End Breadcrumbs -->
  <br>
    <main class="id-main">
        <div class="container justify-content-center">

            <form action="{{ route('Universite.store')}}" method="post" class="form-horizontal justify-content-center ">
                @csrf
                {{ csrf_field() }}
                    <br>
                    <div class="form-group ">
                        <label class="col-sm-4 control-label">Nom</label>
                        <div class="col-sm-9">
                          <input class="form-control" id="nom" type="text" name="nom">
                        </div>
                  <div class=" form-group">
                    <label class="col-sm-4 control-label">adresse:</label>
                        <div class="col-sm-9">
                          <input class="form-control" id="adresse" type="text" name="adresse">
                        </div>
                    </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Email:</label>
                        <div class="col-sm-9">
                          <input class="form-control" id="adr_mail" type="text" name="adr_email">
                        </div>
                    </div>
                 </div>

                <div class="form-group ">
                    <label class="col-sm-4 control-label">Description</label>
                    <div class="col-sm-9">
                     <textarea class="form-control" name="description" rows="5" placeholder="Message" required></textarea>
                    </div>
                </div><br>
                 <hr>
               <h5> les filieres proposés par votre Univeristés</h5>
                <div class="form-group ">
                 <label class="col-sm-4 control-label"> <strong >Filieres </strong></label>
                 <input type="filed[]" name="filiere" >
                </div><br>


                <div class="form-group " >
                    <style>.color-99CC5B{background-color:#ff864e;}</style>
                   <button class="btn color-99CC5B" type="submit">Enregister</button>
                </div><br>
              </form>

            </div>
        </div>

    </main>



@include('home.footer')
