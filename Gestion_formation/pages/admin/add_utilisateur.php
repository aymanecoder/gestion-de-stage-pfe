
<main id="main" class="main">

  <div class="pagetitle">
    <h1>L'ajout d'un utilisateur</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Tableau de Bord</a></li>
        <li class="breadcrumb-item active">Ajoter un utilisateur</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">  
   
    <div class="row">

      <?php 

        if(isset($_POST['btn_enregistrer'])){
          if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['genre']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['telephone']) && !empty($_POST['login']) && !empty($_POST['nbr_acces']) && !empty($_POST['Date_acces'])){
            try{
              $role = $_POST['role']; 
              $nom = $_POST['nom']; 
              $prenom =  $_POST['prenom'];
              $genre =  $_POST['genre'];
              $email =  $_POST['email']; 
              $telephone =  $_POST['telephone']; 
              $login =  $_POST['login'];
              $password = $_POST['password']; 
              $nbr_acces =  $_POST['nbr_acces']; 
              $date_acces =  $_POST['date_acces'];  

              $cmd = $connected->prepare("INSERT INTO utilisateur(`Role`, `Nom`, `Prenom`, `Genre`, `telephone`, `email`, `Login`, `Password`, `Date_acces`, `nbr_acces`) VALUES(:role,:nom,:prenom,:genre,:telephone,:email,:login,:password,:date_acces,:nbr_acces)"); 
              $cmd->execute(array(":role"=>$role,":nom"=>$nom, ":prenom"=>$prenom, ":genre"=>$genre, ":email"=>$email, ":password"=>$password, ":telephone"=>$telephone, ":login"=>$login, ":nbr_acces"=>$nbr_acces, ":date_acces"=>$date_acces)); 
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
          <div class="card-header card-title"> <i class="bx bxs-plus-square"></i> Ajouter un utilisateur  </div>
          <div class="card-body mt-5">
            <div class="form-group row" >
                <label for="inputIntitule" class="col-sm-3 col-form-label">Login</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="login" id="login" placeholder="Entrer le login...">
                </div>
            </div>
            <div class="form-group row" >
                <label for="inputIntitule" class="col-sm-3 col-form-label">Nom</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrer le nom...">
                </div>
            </div>
            <div class="form-group row" >
                <label for="inputIntitule" class="col-sm-3 col-form-label">Prenom :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Entrer le prenom...">
                </div>
            </div>
            <div class="form-group row" >
                <label for="inputIntitule" class="col-sm-3 col-form-label">Email :</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Entrer l'email...">
                </div>
              </div>
            <div class="form-group row">    
              <label for="inputRole" class="col-sm-3 col-form-label">Role</label>
              <div class="col-sm-9">
                <select class="form-select" id="validationDefault04" name="Devision" id="Devision" required="">
                    <option selected="" disabled="" value=""> -- SELLECTIONNER --</option>
                    <?php  

                      $cmd = $connected->query("SELECT * FROM `role` ");  
                      if($cmd){
                        while ($data = $cmd->fetch()){?> 
                          <option value="<?php  echo $data["id_Role"]; ?>"><?php  echo $data["Intitule"]; ?></option><?php  
                        }
                      }
                    ?>
                  </select>
              </div>
                 
            </div> 
            <div class="form-group row mt-3" >
                <label for="inputIntitule" class="col-sm-3 col-form-label">telephone :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Entrer le telephone...">
                </div>
            </div>
            <div class="form-group row" >
                <label for="inputIntitule" class="col-sm-3 col-form-label">Mot de passe :</label>
                <div class="col-sm-9">
                <input type="password" name="password" class="form-control" id="password" placeholder="Mot d passe">   
                </div>
            </div>
            <div class="form-group row" >
                <label for="inputIntitule" class="col-sm-3 col-form-label">Genre :</label>
                <div class="col-sm-9">
                  <div class="form-group ">
                    <div class="col-sm-3">
                      <input class="check" type="radio" name="genre" id="genre" value="male" checked>
                      <label class="form-check-label" for="genre">
                          Male
                      </label>
                    </div>
                    <div class="col-sm-6">

                      <input class="check" type="radio" name="genre" id="genre" value="Femme">
                      <label class="form-check-label" for="genre">
                          Femme
                      </label> 
                    </div> 
                  </div>
                </div>
            </div>
            <div class="form-group row" >
                <label for="inputIntitule" class="col-sm-3 col-form-label">nbr_acces :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="nbr_acces" id="nbr_acces" placeholder="Entrer le nombre d'acces...">
                </div>
            </div> 
            <div class="form-group row" >
                <label for="inputIntitule" class="col-sm-3 col-form-label">Date acces :</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" name="date_acces" id="date_acces">
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