
<main id="main" class="main">

  <div class="pagetitle">
    <h1>L'ajout d'un formateur</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Tableau de Bord</a></li>
        <li class="breadcrumb-item active">Ajoter un formateur</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <?php 
    if(isset($_POST['btn_enregistrer'])){
      var_dump($_POST);
      if(!empty($_POST['Organisation']) && !empty($_POST['Telephone']) && !empty($_POST['Nom']) && !empty($_POST['Prenom']) && !empty($_POST['Email']) && !empty($_POST['Niveau_etude'])){ 

        try{

          $Organisation = $_POST['Organisation']; 
          $Telephone =  $_POST['Telephone'];
          $Nom =  $_POST['Nom']; 
          $Prenom =  $_POST['Prenom']; 
          $Email =  $_POST['Email']; 
          $Niveau_etude =  $_POST['Niveau_etude']; 

          $cmd = $connected->prepare("INSERT INTO `formateur` (`Telephone`, `Organisation`, `Nom`, `Prenom`, `Email`, `Niveau_etude`) VALUES (:Telephone,:Organisation,:Nom,:Prenom,:Email,:Niveau_etude)"); 
          $cmd->execute(array(":Telephone"=>$Telephone, ":Organisation"=>$Organisation, ":Nom"=>$Nom, ":Prenom"=>$Prenom, ":Email"=>$Email, ":Niveau_etude"=>$Niveau_etude)); 

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

  <section class="section dashboard">  
    <div class="row">
      <div class="card">
        <form role="form" method="POST" class="form-horizontal mt-3 g-3 needs-validation" action="" novalidate > 

          <div class="card-header card-title"> <i class="bx bxs-plus-square"></i> Ajouter un formateur  </div>
          <div class="card-body mt-5">
            <div class="form-group row" >
                <label for="inputOrganisation" class="col-sm-3 col-form-label">Organisation :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="Organisation" id="Organisation" placeholder="Entrer l'organisation...">
                </div>
            </div>
            
            <div class="form-group row" >
                <label for="inputNom" class="col-sm-3 col-form-label">Nom :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="Nom" id="Nom" placeholder="Entrer le nom...">
                </div>
            </div>
            <div class="form-group row" >
                <label for="inputPrenom" class="col-sm-3 col-form-label">Prenom :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="Prenom" id="Prenom" placeholder="Entrer le Prenom...">
                </div>
            </div>
            <div class="form-group row" >
                <label for="inputEmail" class="col-sm-3 col-form-label">Email :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="Email" id="Email" placeholder="Entrer l'Email...">
                </div>
            </div>
            <div class="form-group row" >
                <label for="inputTelephone" class="col-sm-3 col-form-label">Telephone :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="Telephone" id="Telephone" placeholder="Entrer le Telephone...">
                </div>
            </div>
            <div class="form-group row" >
                <label for="inputTelephone" class="col-sm-3 col-form-label">Niveau d'étude:</label>
                <div class="col-sm-9">
                  <select class="form-control" name="Niveau_etude" id="Niveau_etude">
                    <option>Niveau d'étude</option>
                    <option>Bac</option>
                    <option>Bac+2(DEUG-DUT)</option>
                    <option>Bac+3(licence)</option>
                    <option>Bac+5(Master/Inginieur)</option>
                    <option>Bac+8(doctorat)</option>
                  </select>
                </div>
            </div>
            <div class="card-footer text-right">
            <button type="reset" class="btn btn-danger" onclick='document.getElementById("Organisation").focus();'>
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