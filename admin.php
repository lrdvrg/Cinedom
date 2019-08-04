<!DOCTYPE html>
<?php
    require_once 'dbconfig.php';

    if(isset($_GET['delete_id'])){
        header("admin.php");
        // BORRAR LA IMAGEN DE LA BBDD
        $stmt_select = $DB_con->prepare('SELECT Imagen FROM peliculas WHERE Peliculas_Id =:uid');
        $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
        $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
        unlink("posters/".$imgRow['Imagen']);
        
        // BORRAR LA PELICULA EN SI
        $stmt_delete = $DB_con->prepare('DELETE FROM peliculas WHERE Peliculas_Id =:uid');
        $stmt_delete->bindParam(':uid',$_GET['delete_id']);
        $stmt_delete->execute();

        
    
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
  ), url('img/trailers.webp'); ">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Administrador</h1>
                        <span class="subheading">Aqui puedes gestionar todos los trailers disponibles en la pagina.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container text-center">
        <button onclick="location.href='agregar.php'" type="button" style="margin-bottom: 20px;" class="btn btn-outline-info">
        <i class="fas fa-plus"></i> Agregar pelicula</button>
    </div>
    <hr>
    <!-- Main Content -->
    <div class="container">
        <div class="row">

            <?php
                require_once 'dbconfig.php';

                $stmt = $DB_con->prepare('SELECT Peliculas_Id, Imagen, Nombre, Actores, Fecha_Estreno, Url FROM peliculas ORDER BY Fecha_Estreno DESC');
                $stmt->execute();
                
                if($stmt->rowCount() > 0)
                {
                    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        extract($row);
            ?>
                        <div class="col">
                            <div class="card" style="width: 20rem;">
                                <div class="card-header">
                                <button onclick="location.href='modificar.php?edit_id=<?php echo $row['Peliculas_Id']; ?>'" type="button" class="btn btn-outline-success" href="modificar.php">Modificar</button>
                                <button onclick="location.href='?delete_id=<?php echo $row['Peliculas_Id']; ?>'" type="button" class="btn btn-outline-danger">Eliminar</button>
                                </div>
                                <img class="card-img-top" src="posters/<?php echo $row['Imagen']; ?>" height="460" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $Nombre."&nbsp;"?></h5>
                                    <p class="card-text"> <strong>Cast</strong> <br> <?php echo $Actores."&nbsp;"?><br> <strong>Fecha de Estreno</strong> <br><?php echo $Fecha_Estreno."&nbsp;"?></p>
                                    <a href="<?php echo $Url."&nbsp;"?>" target="_blank" class="btn btn-outline-primary btn-block">Ver Trailer</a>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                    }
                }
                else
                {
                        ?>
                <div class="col-xs-12">
                    <div class="alert alert-warning">
                        <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No se han registrados peliculas, agregue una e intente de nuevo...
                    </div>
                </div>
                <?php
                    }
        
                ?>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container ">
            <div class="row ">
                <div class="col-lg-8 col-md-10 mx-auto ">

                    <p style="font-size: 20px; " class="copyright text-muted ">Santo Domingo Studios ™</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js "></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js "></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js "></script>

</body>

</html>

