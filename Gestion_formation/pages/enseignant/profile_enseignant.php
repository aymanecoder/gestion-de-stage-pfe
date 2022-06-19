
<?php 
session_start();

?>

            <?php

                $edit = $_SESSION['id_user_GF'];
                $cmd = $connected->query("SELECT * FROM `enseignat` where id_ens='". $edit."'");

                    if( $cmd){
                        while ($data = $cmd->fetch()){  

                            $row1 = $data['Nom'];
                            $row2 = $data['Prénom'];
                            $row3 = $data['adresse_mail'];
                            $row4 = $data['password'];
                        }
                        $cmd->closeCursor();
                    }
                
                if(isset($_POST['valid'])){
                    if(isset($_FILES['image']) and $_FILES['image']['error']==0)
                    {
                        $dossier= 'photo/';
                        $temp_name=$_FILES['image']['tmp_name'];
                        if(!is_uploaded_file($temp_name))
                        {
                        exit("le fichier est untrouvable");
                        }
                        if ($_FILES['image']['size'] >= 100000000){
                            exit("Erreur, le fichier est volumineux");
                        }
                        $infosfichier = pathinfo($_FILES['image']['name']);
                        $extension_upload = $infosfichier['extension'];
                        
                        $extension_upload = strtolower($extension_upload);
                        $extensions_autorisees = array('png','jpeg','jpg');
                        if (!in_array($extension_upload, $extensions_autorisees))
                        {
                        exit("Erreur, Veuillez inserer une image svp (extensions autorisées: png)");
                        }
                        $nom_photo=  $edit.".".$extension_upload;
                        if(!move_uploaded_file($temp_name,$dossier.$nom_photo)){
                        exit("Problem dans le telechargement de l'image, Ressayez");
                        }
                        $ph_name=$nom_photo;
                }
                else{
                $ph_name="SANS_IMAGE.jpeg";
                }

                $smt = $connected->prepare("UPDATE `enseignat` SET photo = '".$ph_name."' WHERE id_ens  ='".$edit."'");
                $smt->execute();
                
                }
                if(isset($_POST['btn'])){
                    $pass = $_POST['pass'];
                    $cmd = $connected->prepare("UPDATE enseignat SET password = '$pass' where id_ens = '$edit'") ; 


                    $cmd->execute();
                }
            ?>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<main>  
    <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Profile</a>
            <a class="nav-link" href="etudiant.php" target="__blank">enseignant</a>
        </nav>
    <div class="container">
        <!-- Account page navigation-->
        <div class="row">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Profile Picture</div>
                        <div class="card-body text-center">
               
                            <!-- Profile picture image-->
                            <?php  echo "<img class=\"img-account-profile rounded-circle mb-2\" src=\"photo/$ph_name\" alt=\"photo\" width=70 height=70
                     />";?>
                            <!-- Profile picture help block-->
                            <div class="small font-italic text-muted mb-4">JPG or PNG or JPEG no larger than 5 MB</div>
                            <!-- Profile picture upload button-->
                            <div class="mb-3">
                                <label class="custom-file-upload">
                                    <input type="file" name ="image"/>
                                    Upload new profile image
                                </label>
                            </div>
                            <input type="submit" name="valid" value="valider" class="btn btn-primary">
                        </div>
                    </div>
                </div> 
            </form>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                    <input class="form-control" id="inputFirstName" type="text"  value="<?php echo  $row2;  ?>">
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                    <input class="form-control" id="inputLastName" type="text"  value=" <?php echo $row1;?>">
                                </div>
                            </div>
                             <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" id="inputEmailAddress" type="email"  value="<?php echo $row3;?>">
                            </div>
                            <!-- Form Group (password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">password</label>
                                <input class="form-control" id="inputUsername" type="text" value="<?php echo $row4;?>">
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">new password</label>
                                <input class="form-control" id="inputUsername" type="text" placeholder="Enter your new username" name="pass">
                            </div>
                            <!-- Save changes button-->
                            <button class="btn btn-warning" type="submit" name="btn">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
       
<style>

    .col-md-6{

          margin-left: 20px;
    }
    .row{

        width: 80%;
        margin-left: 40%;
        margin-right: 5%;
    }
            body{margin-top:20px;
            background-color:#f2f6fc;
            color:#69707a;
            }
            input[type="file"] {
    display: none;
}
.custom-file-upload {
    border: 1px solid #ccc;
    border-radius: 15px;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
    background-color: #4424D6;
}
                .img-account-profile {
                    height: 10rem;
                }
                    .rounded-circle {
                    border-radius: 50% !important;
                }
                    .card {
                        box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
                    }
            .card .card-header {
                font-weight: 500;
            }
            .card-header:first-child {
                border-radius: 0.35rem 0.35rem 0 0;
            }
            .card-header {
                padding: 1rem 1.35rem;
                margin-bottom: 0;
                background-color: rgba(33, 40, 50, 0.03);
                border-bottom: 1px solid rgba(33, 40, 50, 0.125);
            }
            .form-control, .dataTable-input {
                display: block;
                width: 100%;
                padding: 0.875rem 1.125rem;
                font-size: 0.875rem;
                font-weight: 400;
                line-height: 1;
                color: #69707a;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #c5ccd6;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                border-radius: 0.35rem;
                transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            }

            .nav-borders .nav-link.active {
                color: #0061f2;
                border-bottom-color: #0061f2;
            }
            .nav-borders .nav-link {
                color: #69707a;
                border-bottom-width: 0.125rem;
                border-bottom-style: solid;
                border-bottom-color: transparent;
                padding-top: 0.5rem;
                padding-bottom: 0.5rem;
                padding-left: 0;
                padding-right: 0;
                margin-left: 1rem;
                margin-right: 1rem;
            }
</style>