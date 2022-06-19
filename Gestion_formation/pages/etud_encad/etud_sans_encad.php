
<?php require_once 'pages/admin/header_admin.php'; 
 include('pages/include/connexion.php');

?>


<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<main id="main" class="main">

  <div class="pagetitle">
    <h1>Listes des etudiant</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Tableau de Bord</a></li>
        <li class="breadcrumb-item active">Liste des etudiant</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">  
   
    <div class="row">
      <div class="card">
        <form role="form" method="POST" class="form-horizontal mt-3 g-3 needs-validation" action="" novalidate > 
          <div class="card-header card-title"> <i class="bx bx-list-ul"></i> Liste des etudiants encadree par enseignant </div>
          <div class="card-body mt-5"> 
            !-- Table with stripped rows -->
          


	<?php
 
     $requ2="SELECT  `diplôme`, `apogee`, `nom`, `prenom`, `email`, `password` FROM `etudient` WHERE etudient.id_encadrent is NULL";
	 $resultat2=mysqli_query($link,$requ2);
	 $row=mysqli_fetch_assoc($resultat2);
	 ?>
	   <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col" width="10%">diplôme</th>
                  <th scope="col" width="25%">apogee</th>
                  <th scope="col" width="20%">nom</th>
                  <th scope="col" width="25%">prenom</th>
                  <th scope="col" width="20%">password</th>
                </tr>

	<?php
	 while ($row=mysqli_fetch_assoc($resultat2)) {?>
       
       <tr>
	 	<td><?php echo $row['diplôme'];?></td>
	 	<td><?php echo $row['apogee'];?></td>
	 	<td><?php echo $row['nom'];?></td>
	 	<td><?php echo $row['prenom'];?></td>
	 	<td><?php echo $row['email'];?></td>
	 	<td><?php echo $row['password'];?></td>
        </tr>

	 	
	<?php }

	 ?>
</table>
</body>
</html>
</body>
</html>