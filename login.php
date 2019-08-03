<!DOCTYPE html>
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

<?php

if(isset($_POST["submit"])){

try{

$base=new PDO("mysql:host=localhost; dbname=trailers", "root", "");

$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql="SELECT * FROM usuarios WHERE Nombre_Usuario= :login AND Contrasena= :password";

$resultado=$base->prepare($sql);

$login=htmlentities(addslashes($_POST["login"]));

$password=htmlentities(addslashes($_POST["password"]));

$resultado->bindValue(":login", $login);

$resultado->bindValue(":password", $password);

$resultado->execute();

$numero_registro=$resultado->rowCount();

if($numero_registro!=0){
     header("location:admin.php");
}

}catch (Exception $e) {
 die("Error: ". $e-> getMessage());
}
}
?>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.php">
             Cinedom
            </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="trailers.php">Trailers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">
                            <i class="fas fa-users-cog"></i> Log-in
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
  ), url('https://img.freepik.com/foto-gratis/hombre-manos-calculando-lugar-trabajo_23-2147965763.jpg?size=626&ext=jpg'); margin-bottom: 0;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Log - in</h1>
                        <span class="subheading">Inicia sesion para gestionar los contenidos</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 mx-auto">
                <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                <br>
                <form action="" method="post">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Usuario</label>
                            <input type="text" class="form-control" placeholder="Usuario" name="login" id="login" required data-validation-required-message="Debe ingresar su nombre de usuario.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" placeholder="Contraseña" name="password" id="password"  required data-validation-required-message="Debe ingresar su contraseña.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-outline-primary btn-block" name="submit">Iniciar sesion</button>
                    </div>
                </form>

                <?php  

                if(isset($_POST["submit"])){
                    if($numero_registro==0){
                        echo '<div class="alert alert-danger" role="alert">El usuario o contraseña ingresado esta equivocado... </div>';
                    }
                }
                ?>

                <p>¿No tienes una cuenta? <a href="registro.php" class="card-link">Registrate pulsando aqui</a></p>
            </div>
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

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

</body>

</html>