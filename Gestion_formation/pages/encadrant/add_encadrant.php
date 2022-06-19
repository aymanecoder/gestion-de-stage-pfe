<?php
 require_once 'pages/admin/header_admin.php'; ?>
<main id="main" class="main">
<main id="main" class="main">

  <div class="pagetitle">
    <h1>L'ajout d'un module</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Tableau de Bord</a></li>
        <li class="breadcrumb-item active">Ajoter un module</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <?php 
    if(isset($_POST['btn_enregistrer'])){
      if(!empty($_POST['Intitule']) && !empty($_POST['Formateur']) && !empty($_POST['Duree']) && !empty($_POST['Formation']) && !empty($_POST['Description'])){ 

        try{

          $Intitule = $_POST['Intitule']; 
          $Formateur =  $_POST['Formateur'];
          $Duree =  $_POST['Duree']; 
          $Formation =  $_POST['Formation']; 
          $Description =  $_POST['Description']; 
          var_dump($_POST);
          $cmd = $connected->prepare("INSERT INTO `module` (`Formateur`, `Intitule`, `Duree`, `Description`, `Formation`) VALUES (:Formateur,:Intitule,:Duree,:Description,:Formation)"); 
          
          $cmd->execute(array(":Formateur"=>$Formateur, ":Intitule"=>$Intitule, ":Duree"=>$Duree, ":Description"=>$Description, ":Formation"=>$Formation)); 

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

          <div class="card-header card-title"> <i class="bx bxs-plus-square"></i> Ajouter un module  </div>
          <div class="card-body mt-5">
            <div class="form-group row" >
                <label for="inputIntitule" class="col-sm-3 col-form-label">Intitule :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="Intitule" id="Intitule" placeholder="Entrer le titre du l'intitule...">
                </div>
            </div>
            <div class="form-group row" >
                <label for="inputFormateur" class="col-sm-3 col-form-label">Formateur :</label>
                <div class="col-sm-9">
                  <select class="form-select" id="validationDefault04" name="Formateur" id="Formateur" required="">
                    <option selected="" disabled="" value=""> -- SELLECTIONNER --</option>
                    <?php  

                      $cmd = $connected->query("SELECT * FROM `formateur` ");  
                      if($cmd){
                        while ($data = $cmd->fetch()){?> 
                          <option value="<?php  echo $data["id_Formateur"]; ?>"><?php  echo $data["Nom"].' '.$data["Prenom"] ?></option><?php  
                        }
                      }
                    ?>
                  </select>
                </div>
            </div>
            <div class="form-group row" >
                <label for="inputFormation" class="col-sm-3 col-form-label">Formation :</label>
                <div class="col-sm-9">
                  <select class="form-select" id="validationDefault04" name="Formation" id="Formation" required="">
                    <option selected="" disabled="" value=""> -- SELLECTIONNER --</option>
                    <?php  

                      $cmd = $connected->query("SELECT * FROM `formation` ");  
                      if($cmd){
                        while ($data = $cmd->fetch()){?> 
                          <option value="<?php  echo $data["id_Formation"]; ?>"><?php  echo $data["Intitule"]?></option><?php  
                        }
                      }
                    ?>
                  </select>
                </div>
            </div>
            <div class="form-group row" >
                <label for="inputDuree" class="col-sm-3 col-form-label">Duree :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="Duree" id="Duree" placeholder="Entrer la durée du module">
                </div>
            </div>
            <div class="form-group row" >
                <label for="inputDescription" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                  <textarea class="form-control" name="Description" id="Description" rows="5"></textarea>               
                </div>
            </div>
            <div class="card-footer text-right">
            <button type="reset" class="btn btn-danger" onclick='document.getElementById("Intitule").focus();'>
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