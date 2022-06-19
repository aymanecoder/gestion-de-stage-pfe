  <main id="main" class="main">


      <?php 

        if(isset($_POST['btn_enregistrer'])){
          if(!empty($_POST['Nom_fr']) && !empty($_POST['Nom_ar'])){ 

            try{

              $Nom_fr = $_POST['Nom_fr']; 
              $Nom_ar =  $_POST['Nom_ar'];
              $Description =  $_POST['Description']; 

              $cmd = $connected->prepare("INSERT INTO division(`Nom_fr`, `Nom_ar`, `Description`) VALUES(:Nom_fr,:Nom_ar,:Description)"); 
              $cmd->execute(array(":Nom_fr"=>$Nom_fr, ":Nom_ar"=>$Nom_ar, ":Description"=>$Description)); 


              if($cmd == true){ ?>
                <div class="alert alert-success" role="alert">
                  L'ajout à été effectuer avec succés
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div> <?php 
              }
              else{?>
                <div class="alert alert-danger" role="alert">
                  Erreur !
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div> <?php 
              }
            } 
            catch(Exception $e)
            {
              die('Erreur : '.$e->getMessage());
            }  

          }
        } 


      ?>


  <div class="pagetitle">
    <h1>L'ajout une division</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Tableau de Bord</a></li>
        <li class="breadcrumb-item active">Ajoter une division</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">  
    <div class="row">
      <div class="card">
        <form role="form" method="POST" class="form-horizontal mt-3 g-3 needs-validation" action="" novalidate > 

          <div class="card-header card-title"> <i class="bx bxs-plus-square"></i> Ajouter une division  </div>
          <div class="card-body mt-5">
              <div class="form-group row" >
                <label for="inputNom_fr" class="col-sm-3 col-form-label">Nom :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="Nom" id="Nom" placeholder="...">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label mt-1">Nom_fr :</label>  
                <div class="col-sm-9">
                    <input type="text" class="form-control " name="Nom_fr" id="Nom_fr" placeholder="...">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label mt-1">Nom_ar :</label>  
                <div class="col-sm-9">
                    <input type="text" class="form-control " name="Nom_ar" id="Nom_ar" placeholder="...">
                </div>
              </div>  
              <div class="form-group row">
                <label for="inputDescription" class="col-sm-3 col-form-label mt-1">Description :</label>
                <div class="col-sm-9">
                    <textarea class="form-control" rows="5" name="Description" id="Description"></textarea>
                </div>
              </div>
          </div>
          <div class="card-footer text-right">
            <button type="reset" class="btn btn-danger" onclick='document.getElementById("Nom_fr").focus();'>
              <i class="bx bx-x"></i>  Annuler
            </button>
            <button type="submit" class="btn btn-success" name="btn_enregistrer" id="btn_enregistrer">
              <i class="bx bxs-plus-square"></i>  Enregistrer
            </button>
          </div>
        </form>
      </div><!-- card -->

    </div> <!-- row -->

  </section> 

</main><!-- End #main -->