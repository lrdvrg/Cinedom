<!DOCTYPE html>
<?php
error_reporting( ~E_NOTICE ); // avoid notice
 require_once 'dbconfig.php';
 
 if(isset($_POST['agregar']))
 {
  $Nombre = $_POST['name'];
  $Actores = $_POST['cast'];
  $Fecha_Estreno = $_POST['fecha'];
  $Url = $_POST['url'];
  
  $imgFile = $_FILES['poster']['name'];
  $tmp_dir = $_FILES['poster']['tmp_name'];
  $imgSize = $_FILES['poster']['size'];

  echo $_FILES['poster']['tmp_name'];


   $upload_dir = 'posters/'; // upload directory
 
   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
  
   // valid image extensions
   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
   // rename uploading image
   $poster = rand(1000,1000000).".".$imgExt;
    
   move_uploaded_file($tmp_dir,$upload_dir.$poster);

   // allow valid image file formats
   if(in_array($imgExt, $valid_extensions)){   
    // Check file size '5MB'
    if($imgSize < 5000000)    {
     move_uploaded_file($tmp_dir,$upload_dir.$imgFile);
    }
    else{
     $errMSG = "Sorry, your file is too large.";
    }
   }
   else{
    $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
   }

  
  
  // if no error occured, continue ....
  if(!isset($errMSG))
  {
   $stmt = $DB_con->prepare('INSERT INTO peliculas(Imagen,Nombre,Actores,Fecha_Estreno,Url) VALUES(:imagen, :nombre, :actores, :fecha, :link)');
   $stmt->bindParam(':imagen',$poster);
   $stmt->bindParam(':nombre',$Nombre);
   $stmt->bindParam(':actores',$Actores);
   $stmt->bindParam(':fecha',$Fecha_Estreno);
   $stmt->bindParam(':link',$Url);
   
   if($stmt->execute())
   {
    $successMSG = "new record succesfully inserted ...";
    header("refresh:5;index.php"); // redirects image view page after 5 seconds.
   }
   else
   {
    $errMSG = "error while inserting....";
   }
  }
 }
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cinedom</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.php">Cinedom</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
              </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php"> Ir atras
                            </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">
                            <i class="fas fa-sign-out-alt"></i> Log-out
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: linear-gradient(
    rgba(0, 0, 0, 0.6),
    rgba(0, 0, 0, 0.7)
  ),  url('https://daily.jstor.org/wp-content/uploads/2017/11/popcorn_history_1050x700.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Agregar</h1>
                        <span class="subheading">Agrega los datos de la nueva pelicula</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 mx-auto">
                <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                <form name="sentMessage" id="loginForm" method="post" enctype="multipart/form-data" novalidate>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Nombre de la pelicula</label>
                            <input type="text" class="form-control" placeholder="Nombre de la pelicula" id="name" name="name" required data-validation-required-message="Debe ingresar el nombre de la pelicula.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Cast</label>
                            <input type="text" class="form-control" placeholder="Cast" id="cast" name="cast" required data-validation-required-message="Debe ingresar el nombre del actor principal.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Fecha de estreno</label>
                            <input type="date" class="form-control" placeholder="Fecha de estreno" id="fecha" name="fecha" required data-validation-required-message="Debe ingresar la fecha de estreno de la pelicula.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>URL del trailer</label>
                            <input type="text" class="form-control" placeholder="Direccion del trailer en Youtube" id="url" name="url" required data-validation-required-message="Debe ingresar el link del trailer de la pelicula.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Poster</label>
                            <input type="file" class="file" placeholder="Poster" id="poster" name="poster" accept="image/*" required data-validation-required-message="Debe ingresar alguna imagen como poster.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary" id="agregar" name="agregar">Agregar pelicula</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">

                    <p style="font-size: 20px;" class="copyright text-muted">Santo Domingo Studios ™</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

</body>

</html>