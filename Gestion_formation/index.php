<?php if(session_status() == PHP_SESSION_NONE) session_start(); ?>
<?php require_once 'pages/include/Cnx.php'; ?>
<?php require_once 'pages/include/fonction.php'; ?>
<?php require_once 'pages/admin/header_admin.php'; ?>
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
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <!--etudiant Card-->
      <div class="col-4">
        <div class="card info-card sales-card"> 

          <div class="card-body"> 
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="ri-account-circle-line"></i>
              </div>
              <div class="ps-3">
                <h6> Etudiant_diplome </h6>
              </div>
            </div><!-- d-flex -->
          </div><!-- card-body -->

          <div class="card-footer bg-transparent">
            <div class="row">  
              <div class="col-6"> 
                <a href="page.php?lien=etudiant" type="button" class="btn btn-link non-souligne">
                  <i class="bx bx-list-ul"></i> Liste
                </a> 
              </div>
              <div class="col-6 text-right"> 
                <a href="page.php?lien=add_etudiant" type="button" class="btn btn-link non-souligne">
                  <i class="bx bxs-plus-square"></i> ajouter
                </a> 
              </div> 
            </div><!-- row -->
          </div><!-- card-footer -->

        </div><!-- card -->
      </div><!-- col-4 etudiant --> 

      <!--enseignant Card-->
      <div class="col-4">
        <div class="card info-card sales-card"> 

          <div class="card-body"> 
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="ri-account-box-line"></i>
              </div>
              <div class="ps-3">
                <h6>Enseignant</h6>
              </div>
            </div><!-- d-flex -->
          </div><!-- card-body -->

          <div class="card-footer bg-transparent">
            <div class="row">  
              <div class="col-6"> 
                <a href="page.php?lien=enseignant" type="button" class="btn btn-link non-souligne">
                  <i class="bx bx-list-ul"></i> Liste
                </a> 
              </div>
              <div class="col-6 text-right"> 
                <a href="" type="button" class="btn btn-link non-souligne">
                  <i class="bx bxs-plus-square"></i> Refresh
                </a> 
              </div> 
            </div><!-- row -->
          </div><!-- card-footer -->

        </div><!-- card -->
      </div><!-- col-4 enseignant -->

      <!--stage Card-->
      <div class="col-4">
        <div class="card info-card sales-card"> 

          <div class="card-body"> 
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-book"></i>
              </div>
              <div class="ps-3">
                <h6>Etudiant_note</h6>
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
                <a href="" type="button" class="btn btn-link non-souligne">
                  <i class="bx bxs-plus-square"></i> Refresh
                </a> 
              </div> 
            </div><!-- row -->
          </div><!-- card-footer -->

        </div><!-- card -->
      </div><!-- col-4 stage -->
      <div class="col-4">
        <div class="card info-card sales-card"> 

          <div class="card-body"> 
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-book"></i>
              </div>
              <div class="ps-3">
                <h6>Etud_enseignant</h6>
              </div>
            </div><!-- d-flex -->
          </div><!-- card-body -->

          <div class="card-footer bg-transparent">
            <div class="row">  
              <div class="col-6"> 
                <a href="page.php?lien=etudiant_par_enseignant" type="button" class="btn btn-link non-souligne">
                  <i class="bx bx-list-ul"></i> Liste
                </a> 
              </div>
              <div class="col-6 text-right"> 
                <a href="" type="button" class="btn btn-link non-souligne">
                  <i class="bx bxs-plus-square"></i> Refresh
                </a> 
              </div> 
            </div><!-- row -->
          </div><!-- card-footer -->

        </div><!-- card -->
      </div><!-- col-4 stage -->

      <!--encadrant Card-->
      <div class="col-4">
        <div class="card info-card sales-card"> 

          <div class="card-body"> 
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="ri-health-book-line"></i>
              </div>
              <div class="ps-3">
                <h6>etud_sans_enca</h6>
              </div>
            </div><!-- d-flex -->
          </div><!-- card-body -->

          <div class="card-footer bg-transparent">
            <div class="row">  
              <div class="col-6"> 
                <a href="page.php?lien=etud_sans_encad" type="button" class="btn btn-link non-souligne">
                  <i class="bx bx-list-ul"></i> Liste
                </a> 
              </div>
              <div class="col-6 text-right"> 
                <a href="" type="button" class="btn btn-link non-souligne">
                  <i class="bx bxs-plus-square"></i> Refresh
                </a> 
              </div> 
            </div><!-- row -->
          </div><!-- card-footer -->

        </div><!-- card -->
      </div><!-- col-4 encadrant -->

      <!--entreprise Card-->
      <div class="col-4">
        <div class="card info-card sales-card"> 

          <div class="card-body"> 
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="ri-funds-line"></i>
              </div>
              <div class="ps-3">
                <h6>etud_sans_rapp</h6>
              </div>
            </div><!-- d-flex -->
          </div><!-- card-body -->

          <div class="card-footer bg-transparent">
            <div class="row">  
              <div class="col-6"> 
                <a href="page.php?lien=etud_sans_rapp" type="button" class="btn btn-link non-souligne">
                  <i class="bx bx-list-ul"></i> Liste
                </a> 
              </div>
              <div class="col-6 text-right"> 
                <a href=" " type="button" class="btn btn-link non-souligne">
                  <i class="bx bxs-plus-square"></i> Refresh
                </a> 
              </div> 
            </div><!-- row -->
          </div><!-- card-footer -->

        </div><!-- card -->
      </div><!-- col-4 entreprise -->
    </div>
    <div class="row"> 
      <!--sujet Card-->
      <div class="mb-2"> <h4>ADDMINISTRATION :</h4></div>
      <div class="col-4">
        <div class="card info-card sales-card"> 

          <div class="card-body"> 
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="ri-lightbulb-flash-line"></i>
              </div>
              <div class="ps-3">
                <h6>Stage_valid </h6>
              </div>
            </div><!-- d-flex -->
          </div><!-- card-body -->

          <div class="card-footer bg-transparent">
            <div class="row">  
              <div class="col-6"> 
                <a href="page.php?lien=stage_valide" type="button" class="btn btn-link non-souligne">
                  <i class="bx bx-list-ul"></i> Liste
                </a> 
              </div>
              <div class="col-6 text-right"> 
                <a href="" type="button" class="btn btn-link non-souligne">
                  <i class="bx bxs-plus-square"></i> Refresh
                </a> 
              </div> 
            </div><!-- row -->
          </div><!-- card-footer -->

        </div><!-- card -->
      </div><!-- col-4 sujet -->

      <!--Utilisater Card-->
      <div class="col-4">
        <div class="card info-card sales-card"> 

          <div class="card-body"> 
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="ri-admin-line"></i>
              </div>
              <div class="ps-3">
                <h6>note</h6>
              </div>
            </div><!-- d-flex -->
          </div><!-- card-body -->

          <div class="card-footer bg-transparent">
            <div class="row">  
              <div class="col-6"> 
                <a href="page.php?lien=visualisation_note" type="button" class="btn btn-link non-souligne">
                  <i class="bx bx-list-ul"></i> Liste
                </a> 
              </div>
              <div class="col-6 text-right"> 
                <a href="" type="button" class="btn btn-link non-souligne">
                  <i class="bx bxs-plus-square"></i> Refresh
                </a> 
              </div> 
            </div><!-- row -->
          </div><!-- card-footer -->

        </div><!-- card -->
      </div><!-- col-4 Utilisater -->

      <!--Devision Card-->
      <div class="col-4">
        <div class="card info-card sales-card"> 

          <div class="card-body"> 
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="ri-building-4-line"></i>
              </div>
              <div class="ps-3">
                <h6>visualiser_stage</h6>
              </div>
            </div><!-- d-flex -->
          </div><!-- card-body -->

          <div class="card-footer bg-transparent">
            <div class="row">  
              <div class="col-6"> 
                <a href="page.php?lien=visualiser_stage" type="button" class="btn btn-link non-souligne">
                  <i class="bx bx-list-ul"></i> Liste
                </a> 
              </div>
              <div class="col-6 text-right"> 
                <a href="" type="button" class="btn btn-link non-souligne">
                  <i class="bx bxs-plus-square"></i> Refresh
                </a> 
              </div> 
            </div><!-- row -->
          </div><!-- card-footer -->

        </div><!-- card -->
      </div><!-- col-4 Devision -->

      
    </div>  

  </section> 

</main><!-- End #main -->

<?php require_once 'pages/include/footer.php'; ?>   