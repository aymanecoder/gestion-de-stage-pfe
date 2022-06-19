<main id="main" class="main">

  <div class="pagetitle">
    <h1>L'ajout d'un service</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Tableau de Bord</a></li>
        <li class="breadcrumb-item active">Ajoter un service </li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
    <?php 

        if(isset($_POST['btn_enregistrer'])){
          if(!empty($_POST['Division']) && !empty($_POST['Nom_fr']) && !empty($_POST['Nom_ar'])){ 
            var_dump($_POST);
            try{
              $Division = $_POST['Division'];
              $Nom_fr = $_POST['Nom_fr']; 
              $Nom_ar =  $_POST['Nom_ar'];
              $Description =  $_POST['Description']; 

              $cmd = $connected->prepare("INSERT INTO service(`Division`, `Nom_fr`, `Nom_ar`, `Description`) VALUES(:Division,:Nom_fr,:Nom_ar,:Description)"); 
              $cmd->execute(array(":Division"=>$Division, ":Nom_fr"=>$Nom_fr, ":Nom_ar"=>$Nom_ar, ":Description"=>$Description)); 


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

          <div class="card-header card-title"> <i class="bx bxs-plus-square"></i> Ajouter une service  </div>
          <div class="card-body mt-5">
              <div class="form-group row" >
                <label for="inputIntitule" class="col-sm-3 col-form-label">Devision :</label>
                <div class="col-sm-9">
                  <select class="form-select" id="validationDefault04" name="Devision" id="Devision" required="">
                    <option selected="" disabled="" value=""> -- SELLECTIONNER --</option>
                    <?php  

                      $cmd = $connected->query("SELECT * FROM `division` ");  
                      if($cmd){
                        while ($data = $cmd->fetch()){?> 
                          <option value="<?php  echo $data["id_Division"]; ?>"><?php  echo $data["Nom_fr"]; ?></option><?php  
                        }
                      }
                    ?>
                  </select>
                 
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
            <button type="reset" class="btn btn-danger" onclick='document.getElementById("intitule").focus();'>
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