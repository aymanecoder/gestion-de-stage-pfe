 
<?php if(session_status() == PHP_SESSION_NONE) session_start(); ?>
<?php require_once 'pages/include/Cnx.php'; ?>

<?php  
  if(!empty($_SESSION['id_user_GF'])){
    header('Location: index.php');
  }
?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Authentification</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container"> 

            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <div class="d-flex justify-content-center py-4">
                  <h2>
                    <span class="logo d-flex align-items-center w-auto">
                      <i class="bx bxs-layer"></i>&nbsp; Gestion de Pfe
                    </span> 
                  </h2>
                </div><!-- End Logo --> 

                <?php

                   if(isset($_POST['btn_connexion'])){
                    if(!empty($_POST['username']) && !empty($_POST['password'])){  
                     
                        $email = $_POST['username']; 
                        $password =  $_POST['password'];

                        $cond = false;

                        $cmd = $connected->query("SELECT * FROM `etudient` where email = '".$email."' AND password= '".$password."' "); 
                         
                        if($cmd){
                          while ($data = $cmd->fetch()){  
                            $_SESSION['id_user_GF'] = $data['apogee'];
                            $cond = true; 
                            echo '<meta http-equiv="refresh" content="0; url=page.php?lien=index_etudiant" />';
                          }
                          $cmd->closeCursor();
                        }
                      
                    }
                  }
                          if(isset($_POST['btn_connexion'])){
                    if(!empty($_POST['username']) && !empty($_POST['password'])){  
                     
                        $email = $_POST['username']; 
                        $password =  $_POST['password'];

                        $cond = false;

                        $cmd = $connected->query("SELECT * FROM `enseignat` where adresse_mail = '".$email."' AND password= '".$password."' "); 
                         
                        if($cmd){
                          while ($data = $cmd->fetch()){  
                            $_SESSION['id_user_GF'] = $data['id_ens'];
                            $cond = true; 
                            echo '<meta http-equiv="refresh" content="0; url=page.php?lien=index_enseignant" />';
                          }
                          $cmd->closeCursor();
                        }
                          
                      
                    }
                  }
                  if(isset($_POST['btn_connexion'])){
                    if(!empty($_POST['username']) && !empty($_POST['password'])){  
                     
                        $email = $_POST['username']; 
                        $password =  $_POST['password'];

                        $cond = false;

                        $cmd = $connected->query("SELECT * FROM `user` where login = '".$email."' AND pass= '".$password."' "); 
                         
                        if($cmd){
                          while ($data = $cmd->fetch()){  
                            $_SESSION['id_user_GF'] = $data['login'];
                            $cond = true; 
                             echo '<meta http-equiv="refresh" content="0; url=index.php" />';
                          }
                          $cmd->closeCursor();
                        }
                      }
                      }
                          
                  

                    
 
 ?>
               

                <form role="form" method="POST" class="form-horizontal mt-3 g-3 needs-validation" action="" novalidate > 

                  <div class="card"> 

                    <div class="card-header"><span  class="card-title"> Connection à votre compte</span> </div>

                    <div class="card-body"> 

                      <div class="row">
                        
                         
                        <label for="username" class="form-label" style="margin-top: 20px;">Utilisateur</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend"><i class="bx bxs-user"></i></span>  
                          <input type="text" name="username" class="form-control" id="username" placeholder="Nom d'utilisateur..." required>
                          <div class="invalid-feedback">S'il vous plait entrez votre nom d'utilisateur.</div>
                        </div> 

                        <label for="password" class="form-label" style="margin-top: 20px;">Mot de passe</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend"><i class="bx bxs-lock-alt"></i></span>
                          <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe..." required>
                          <div class="invalid-feedback">S'il vous plait entrez votre mot de passe!</div>
                        </div>

                        <div class="form-check" style="margin-top: 20px;">
                          <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                          <label class="form-check-label" for="rememberMe">Rester connecter</label>
                        </div> 

                      </div>  
                      

                    </div><!-- card-body -->

                    <div class="card-footer">
                      <button class="btn btn-primary w-100" type="submit" name="btn_connexion" id="btn_connexion">
                        Connexion <i class="bx bxs-chevrons-right"></i>  
                      </button> 
                    </div><!-- card-footer -->

                  </div><!-- card --> 
                     
                </form>

              </div>
            </div>
                  
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>