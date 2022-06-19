<?php if(session_status() == PHP_SESSION_NONE) session_start(); ?>
<?php require_once 'pages/include/Cnx.php'; ?>
<?php require_once 'pages/include/fonction.php'; ?>
<?php require_once 'pages/enseignant/heiderenseignant.php'; ?>
<?php require_once 'pages/include/sidebar.php'; ?>

<?php  
  if(empty($_SESSION['id_user_GF'])){
    header('Location: authentification.php');
  } 
    
    if(!empty($_GET['lien'])){
        $content = htmlentities($_GET['lien']);
        switch ($content) { 

            case 'sujet': 
                include "pages/sujet/sujet.php"; 
            break; 

            case 'add_sujet': 
                include "pages/sujet/add_sujet.php"; 
            break;

            case 'index_admin':
                include "pages/Utilisateur/index_admin.php";
            break;

            case 'add_administration':
                include "pages/administration/add_utilisateur.php";
            break; 

            case 'division':
                include "pages/division/division.php";
            break;

            case 'add_division':
                include "pages/division/add_division.php";
            break; 

            case 'service':
                include "pages/service/service.php";
            break;

            case 'add_service':
                include "pages/service/add_service.php";
            break;

            case 'etudiant':
                include "pages/etudiant/etudiant.php";
            break;

            case 'add_etudiant':
                include "pages/etudiant/add_etudiant.php";
            break;

            case 'profile_etudiant':
                include "pages/etudiant/profile_etudiant.php";
            break;

            case 'index_etudiant':
                include "pages/etudiant/index_etudiant.php";
            break;

            case 'enseignant':
                include "pages/enseignant/enseignant.php";
            break;
             
            case 'validation_ens':
                include "pages/enseignant/validation_ens.php";
            break;

            case 'add_enseigant':
                include "pages/enseignant/add_enseignant.php";
            break;

            case 'profile_enseignant':
                include "pages/enseignant/profile_enseignant.php";
            break;
            case 'index_enseignant':
                include "pages/enseignant/index_enseignant.php";
            break;

            case 'stage':
                include "pages/stage/stage.php";
            break;

            case 'add_stage':
                include "pages/stage/add_stage.php";
            break;

            default: 
                include "404.php"; 
            break;

            case 'encadrant':
                include "pages/encadrant/encadrant.php";
            break;

            case 'add_encadrant':
                include "pages/encadrant/add_encadrant.php";
            break;

            case 'entreprise':
                include "pages/entreprise/entreprise.php";
            break;

            case 'add_entreprise':
                include "pages/entreprise/add_entreprise.php";
            break;

            case 'entreprise':
                include "pages/entreprise/entreprise.php";
            break;

            case 'add_entreprise':
                include "pages/entreprise/add_entreprise.php";
            break;





        } 


        include "pages/include/footer.php"; 
    }

    else{

        include "404.php"; 

    }
?>