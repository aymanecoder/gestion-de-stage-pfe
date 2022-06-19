
<main id="main" class="main">

  <div class="pagetitle">
    <h1>L'ajout d'un role</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Tableau de Bord</a></li>
        <li class="breadcrumb-item active">Ajoter un role</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">  
   
    <div class="row">

      <?php 

        if(isset($_POST['btn_enregistrer'])){
          if(!empty($_POST['intitule']) && !empty($_POST['code'])){ 

            try{

              $intitule = $_POST['intitule']; 
              $code =  $_POST['code'];
              $description =  $_POST['description']; 

              $cmd = $connected->prepare("INSERT INTO role(`Intitule`, `Code`, `Description`) VALUES(:intitule,:code,:description)"); 
              $cmd->execute(array(":intitule"=>$intitule, ":code"=>$code, ":description"=>$description)); 


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

      <div class="card">
        <form role="form" method="POST" class="form-horizontal mt-3 g-3 needs-validation" action="" novalidate > 

          <div class="card-header card-title"> <i class="bx bxs-plus-square"></i> Ajouter un rôle  </div>
          <div class="card-body mt-5">
              <div class="form-group row" >
                <label for="inputIntitule" class="col-sm-3 col-form-label">Intitule :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="intitule" id="intitule" placeholder="Entrer l'intitule...">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label mt-1">Code role :</label>  

                <div class="col-sm-9">
                    <input type="text" class="form-control " name="code" id="code" placeholder="Entrer Code role...">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label mt-1">Description :</label>
                <div class="col-sm-9">
                    <textarea class="form-control" rows="5" name="description" id="description" placeholder="description..."></textarea>
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