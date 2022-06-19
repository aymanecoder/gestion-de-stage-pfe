<?php
 require_once 'pages/include/header.php'; ?>


<?php   include('pages/include/connexion.php');?>
<?php session_start();
  $var2= $_SESSION['id_user_GF'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>AJOUTER UN STAGE</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="My-style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="container">
      
        <div class="row">
            <div class="col-10 md-6 m">
              <div class="card-header"></div>
              <div class="card-body">
              <select name="txt_ville" class="form-control" >
                  <?php
                    $cmd = $connected->query("SELECT * FROM `entreprise` ");
                    if($cmd){
                      while ($data = $cmd->fetch()){ ?> 
                    <option value="<?php $data["id_entreprise"] ?>">
                      <?php echo $data["nom"]; ?>
                    </option>
                    <?php }
                    }
                  ?>
              </select>
              <div class="form-group my-3">
                      <label for="nom">adresse_entr :</label>
                          <input type="text" class="form-control" name="adresse_entr" >
              </div>
              <div class="form-group">
                          <label for="prenom">tel :</label>
                              <input type="text" class="form-control" name="tel" >
              </div>
              <div class="form-group">
                      <label for="note">ville :</label>
                          <input type="text" class="form-control" name="ville" >
              </div>
              <div class="form-group">
                      <label for="filiere">nom_enca :</label>
                          <input type="text" class="form-control" name="nom_enca" >
              </div>
              <div class="form-group">
                      <label for="module">prenom_enca :</label>
                          <input type="text" class="form-control" name="prenom_enca" >
              </div>
              <div class="form-group">
                      <label for="module">titre_sujet :</label>
                          <input type="text" class="form-control" name="titre_sujet" >
              </div>
              
              <div class="form-group">
                      <label for="module">description :</label>
                          <input type="text" class="form-control" name="description" >
              </div>
              <div class="form-group">
                      <label for="module">prenom_enca :</label>
                          <input type="text" class="form-control" name="prenom_enca" >
              </div>
              <textarea name="technologie" class="form-control" placeholder="Entrez votre technologie utilisé en stage" cols="25" rows="9" class="form-field animation a3"></textarea>
              <table>
                <tr>
              <td><input type="file" class="form-control my-2" name="fichier1" ></td><td>rapport1</td>
              </tr>
               <tr>
              <td><input type="file" class="form-control my-2" name="fichier2" ></td><td>rapport2</td>
              </tr>
               <tr>
              <td><input type="file" class="form-control my-2" name="fichier3" ></td><td>presentation</td>
              </tr>
               <tr>
              <td><input type="file" class="form-control my-2" name="fichier4" ></td><td>attestation</td>
              </tr>
               <tr>
              <td><input type="file" class="form-control my-2" name="fichier5" ></td><td>fiche d'evaluation</td>
              </tr>
              </table>
              <button class="btn btn-primary my-4" type="submit" name="btn-enregistrer">ajouter</button>
              <div class="row my-2 mx-2 btn btn-info"><a href="page.php?lien=index_etudiant" >back home</a></div>

            </div>
        </div>
    </div>
  </div>
</form>
</body>
</html>
<style>

  .row{
       width: 80%;
       margin-left: 40%;
       margin-right: 50%;
  }
  </style> 



<?php 
if(isset($_POST['btn_enregistrer'])){
$adresse=$_POST['adresse_entr'];
$tele=$_POST['tel'];
$ville=$_POST['ville'];
$nom_encad=$_POST['nom_enca'];
$prenom_encad=$_POST['prenom_enca'];
$titre_suj=$_POST['titre_sujet'];
$descript=$_POST['description'];
$technolog=$_POST['technologie'];
$ville=$_POST['ville'];
$nom_binome=$_POST['nom_bin'];
$prenom_binome=$_POST['prenom_bin'];
  
// rapport-1
  if(isset($_FILES['fichier1']) and $_FILES['fichier1']['error']==0)
  {
    $dossier= 'photo/';
    $temp_name=$_FILES['fichier1']['tmp_name'];
    if(!is_uploaded_file($temp_name))
    {
    exit("le fichier1 est untrouvable");
    }
    if ($_FILES['fichier1']['size'] >= 100000000){
      exit("Erreur, le fichier1 est volumineux");
    }
    $infosfichier = pathinfo($_FILES['fichier1']['name']);
    $extension_upload = $infosfichier['extension'];
    
    $extension_upload = strtolower($extension_upload);
    $extensions_autorisees = array('pdf');
    if (!in_array($extension_upload, $extensions_autorisees))
    {
    exit("Erreur, Veuillez inserer une image svp (extensions autorisées: pdf)");
    }
    $nom_photo=$titre_suj.".".$extension_upload;
    if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
    exit("Problem dans le telechargement de l'image, Ressayez");
    }
    $version1_rapp=$nom_photo;
  }
  
// rapport-2
  if(isset($_FILES['fichier2']) and $_FILES['fichier2']['error']==0)
  {
    $dossier= 'photo/';
    $temp_name=$_FILES['fichier2']['tmp_name'];
    if(!is_uploaded_file($temp_name))
    {
    exit("le fichier2 est untrouvable");
    }
    if ($_FILES['fichier2']['size'] >= 100000000){
      exit("Erreur, le fichier2 est volumineux");
    }
    $infosfichier = pathinfo($_FILES['fichier2']['name']);
    $extension_upload = $infosfichier['extension'];
    
    $extension_upload = strtolower($extension_upload);
    $extensions_autorisees = array('pdf');
    if (!in_array($extension_upload, $extensions_autorisees))
    {
    exit("Erreur, Veuillez inserer une image svp (extensions autorisées: pdf)");
    }
    $nom_photo=$titre_suj.".".$extension_upload;
    if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
    exit("Problem dans le telechargement de l'image, Ressayez");
    }
    $version2_rapp=$nom_photo;
  }
  
// ptrsentation
  if(isset($_FILES['fichier3']) and $_FILES['fichier3']['error']==0)
  {
    $dossier= 'photo/';
    $temp_name=$_FILES['fichier3']['tmp_name'];
    if(!is_uploaded_file($temp_name))
    {
    exit("le fichier3 est untrouvable");
    }
    if ($_FILES['fichier3']['size'] >= 1000000000){
      exit("Erreur, le fichier3 est volumineux");
    }
    $infosfichier = pathinfo($_FILES['fichier3']['name']);
    $extension_upload = $infosfichier['extension'];
    
    $extension_upload = strtolower($extension_upload);
    $extensions_autorisees = array('pdf');
    if (!in_array($extension_upload, $extensions_autorisees))
    {
    exit("Erreur, Veuillez inserer une image svp (extensions autorisées: pdf)");
    }
    $nom_photo=$titre_suj.".".$extension_upload;
    if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
    exit("Problem dans le telechargement de l'image, Ressayez");
    }
    $presentation=$nom_photo;
  }
  
// attestation_stage'
  if(isset($_FILES['fichier4']) and $_FILES['fichier4']['error']==0)
  {
    $dossier= 'photo/';
    $temp_name=$_FILES['fichier4']['tmp_name'];
    if(!is_uploaded_file($temp_name))
    {
    exit("le fichier4 est untrouvable");
    }
    if ($_FILES['fichier4']['size'] >= 1000000000){
      exit("Erreur, le fichier4 est volumineux");
    }
    $infosfichier = pathinfo($_FILES['fichier4']['name']);
    $extension_upload = $infosfichier['extension'];
    
    $extension_upload = strtolower($extension_upload);
    $extensions_autorisees = array('pdf');
    if (!in_array($extension_upload, $extensions_autorisees))
    {
    exit("Erreur, Veuillez inserer une image svp (extensions autorisées: pdf)");
    }
    $nom_photo=$titre_suj.".".$extension_upload;
    if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
    exit("Problem dans le telechargement de l'image, Ressayez");
    }
    $attestation_stage=$nom_photo;
  }

// fiche_evaluation
  if(isset($_FILES['fichier5']) and $_FILES['fichier5']['error']==0)
  {
    $dossier= 'photo/';
    $temp_name=$_FILES['fichier5']['tmp_name'];
    if(!is_uploaded_file($temp_name))
    {
    exit("le fichier5 est untrouvable");
    }
    if ($_FILES['fichier5']['size'] >= 1000000000){
      exit("Erreur, le fichier5 est volumineux");
    }
    $infosfichier = pathinfo($_FILES['fichier5']['name']);
    $extension_upload = $infosfichier['extension'];
    
    $extension_upload = strtolower($extension_upload);
    $extensions_autorisees = array('pdf');
    if (!in_array($extension_upload, $extensions_autorisees))
    {
    exit("Erreur, Veuillez inserer une image svp (extensions autorisées: pdf)");
    }
    $nom_photo=$titre_suj.".".$extension_upload;
    if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
    exit("Problem dans le telechargement de l'image, Ressayez");
    }
    $fiche_evaluation=$nom_photo;
  }
     

     $requette="INSERT INTO `stage`( `nom_binome`, `prenom_binome`, `version1_rapp`, `version2_rapp`, `presentation`, `attestation_stage`, `fiche_evaluation`, `id_etudiant`,id_ens) VALUES ('".$nom_binome."','".$prenom_binome."','".$version1_rapp."','".$version2_rapp."','".$presentation."','".$attestation_stage."','".$fiche_evaluation."',(select etudient.id_etudiant from etudient WHERE apogee ='".$var2."'),116)";
     $resultat=mysqli_query($link,$requette);
     if ($resultat==true) {
       echo "yess";
     }
      $sql5="INSERT INTO `entreprise`(`adresse`, `tel`, `ville`) VALUES ('".$adresse."','".$tele."','".$ville."')";
     $resultat=mysqli_query($link,$sql5);
   
    }        