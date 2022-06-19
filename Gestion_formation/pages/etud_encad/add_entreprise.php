
<main id="main" class="main">

  <div class="pagetitle">
    <h1>L'ajout d'une operation</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Tableau de Bord</a></li>
        <li class="breadcrumb-item active">Ajoter une operation</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <?php 
    if(isset($_POST['btn_enregistrer'])){
      var_dump($_POST);
      if(!empty($_POST['Utilisateur']) && !empty($_POST['Name_table']) && !empty($_POST['id_enregistrement']) && !empty($_POST['Type']) && !empty($_POST['Date'])){ 

        try{

          $Utilisateur = $_POST['Utilisateur']; 
          $Name_table =  $_POST['Name_table']; 
          $id_enregistrement =  $_POST['id_enregistrement']; 
          $Type =  $_POST['Type']; 
          $Date =  $_POST['Date']; 

          $cmd = $connected->prepare("INSERT INTO `operation` (`Utilisateur`, `Name_table`, `id_enregistrement`, `Type`, `Date`) VALUES (:Utilisateur,:Name_table,:id_enregistrement,:Type,:Datee)"); 
          $cmd->execute(array(":Utilisateur"=>$Utilisateur, ":Name_table"=>$Name_table, ":id_enregistrement"=>$id_enregistrement, ":Type"=>$Type, ":Datee"=>$Date)); 

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

          <div class="card-header card-title"> <i class="bx bxs-plus-square"></i> Ajouter une operation  </div>
          <div class="card-body mt-5">
            <div class="form-group row" >
                <label for="inputUtilisateur" class="col-sm-3 col-form-label">Utilisateur :</label>
                <div class="col-sm-9">
                  <select class="form-select" id="validationDefault04" name="Utilisateur" id="Utilisateur" required="">
                    <option selected="" disabled="" value=""> -- SELLECTIONNER --</option>
                    <?php  

                      $cmd = $connected->query("SELECT * FROM `utilisateur` ");  
                      if($cmd){
                        while ($data = $cmd->fetch()){?> 
                          <option value="<?php  echo $data["id_Utilisateur"]; ?>"><?php  echo $data["Nom"].' '.$data["Prenom"] ?></option><?php  
                        }
                      }
                    ?>
                  </select>
                </div>
            </div>
            
            <div class="form-group row" >
                <label for="inputName_table" class="col-sm-3 col-form-label">Nom du tableau :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="Name_table" id="Name_table" placeholder="Entrer le nom de ableau...">
                </div>
            </div>
            <div class="form-group row" >
                <label for="inputid_enregistrement" class="col-sm-3 col-form-label">id_enregistrement :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="id_enregistrement" id="id_enregistrement" placeholder="Entrer id d'enregistrement...">
                </div>
            </div>
            <div class="form-group row" >
                <label for="inputType" class="col-sm-3 col-form-label">Type :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="Type" id="Type" placeholder="Entrer le type d'operation...">
                </div>
            </div>
            <div class="form-group row" >
                <label for="inputTelephone" class="col-sm-3 col-form-label">Date:</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" name="Date" id="Date" >
                </div>
            </div>
            <div class="card-footer text-right">
            <button type="reset" class="btn btn-danger" onclick='document.getElementById("Utilisateur").focus();'>
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