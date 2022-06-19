<?php if(session_status() == PHP_SESSION_NONE) session_start(); ?>
<?php require_once 'pages/include/Cnx.php'; ?>
<?php require_once 'pages/include/fonction.php'; ?>
<?php require_once 'pages/include/header.php'; ?>
<?php require_once 'pages/include/sidebar.php'; ?>

<?php  
  if(empty($_SESSION['id_user_GF'])){
    header('Location: authentification.php');
  }
?>  

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <!--stage Card-->
        <div class="col-4">
        <div class="card info-card sales-card"> 

          <div class="card-body"> 
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-book"></i>
              </div>
              <div class="ps-3">
                <h6>stage</h6>
              </div>
            </div><!-- d-flex -->
          </div><!-- card-body -->

          <div class="card-footer bg-transparent">
            <div class="row">  
              <div class="col-6"> 
                <a href="page.php?lien=stage" type="button" class="btn btn-link non-souligne">
                  <i class="bx bx-list-ul"></i> Liste
                </a> 
              </div>
              <div class="col-6 text-right"> 
                <a href="page.php?lien=add_stage" type="button" class="btn btn-link non-souligne">
                  <i class="bx bxs-plus-square"></i> Ajouter
                </a> 
              </div> 
            </div><!-- row -->
          </div><!-- card-footer -->

        </div><!-- card -->
      </div><!-- col-4 stage -->
    </div>
  </section> 

</main><!-- End #main -->
   