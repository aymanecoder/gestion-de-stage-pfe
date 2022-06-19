<?php
 require_once 'pages/admin/header_admin.php'; ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>L'ajout d'un etudiant</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Tableau de Bord</a></li>
        <li class="breadcrumb-item active">Ajoter un etudiant</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">  
    <?php 

        if(isset($_POST['btn_enregistrer'])){
          var_dump($_POST);
          if(!empty($_POST['apogee'])  && !empty($_POST['Nom']) && !empty($_POST['prenom']) && !empty($_POST['diplôme']) && !empty($_POST['']) && !empty($_POST['Email'])){ 
            echo "string";
            try{

              $apogee = $_POST['apogee']; 
              
              $Nom =  $_POST['nom']; 
              $prenom =  $_POST['prenom']; 
              $diplôme =  $_POST['diplôme']; 
              
              $Email =  $_POST['Email'];

              $cmd = $connected->prepare("INSERT INTO `etudient` (``, `apogee`, `nom`, `prenom`, `diplôme`, ``, `email`) VALUES (:,:apogee,:nom,:prenom,:diplôme,:email)"); 
              $cmd->execute(array( ":apogee"=>$apogee, ":nom"=>$nom, ":prenom"=>$prenom, ":diplôme"=>$diplôme,":email"=>$Email)); 

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
   
    <div class="row">
      <div class="card">
        <form role="form" method="POST" class="form-horizontal mt-3 g-3 needs-validation" action="" novalidate > 

          <div class="card-header card-title"> <i class="bx bxs-plus-square"></i> Ajouter un etudiant  </div>
          <div class="card-body mt-5">
          
            </div>
           </form>

              </div>
            </div>
            <div class="form-group row" >
                <label for="inputnom" class="col-sm-3 col-form-label">nom :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrer le nom...">
                </div>
            </div>
            <div class="form-group row" >
                <label for="inputprenom" class="col-sm-3 col-form-label">prenom :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Entrer le prenom...">
                </div>
            </div>
            <div class="form-group row" >
                <label for="inputEmail" class="col-sm-3 col-form-label">Email :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="Email" id="Email" placeholder="Entrer l'Email...">
                </div>
            </div>
            <div class="form-group row" >
                <label for="inputTelephone" class="col-sm-3 col-form-label">apogee :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="apogee" id="apogee" placeholder="Entrer le apogee...">
                </div>
            </div>
               <div class="form-group row" >
             <select name="diplôme">
                    <option selected="" disabled="" value=""> -- SELLECTIONNER --</option>
                    <?php  

                      $cmd = $connected->query("SELECT * FROM `etudient` ");  
                      if($cmd){
                        while ($data = $cmd->fetch()){?> 
                          <option value="<?php  echo $data["id_etudiant"]; ?>"><?php  echo $data["diplôme"]?></option><?php  
                        }
                      }
                    ?>
                  </select>
            <div class="card-footer text-right">
            <button type="reset" class="btn btn-danger" onclick='document.getElementById("apogee").focus();'>
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