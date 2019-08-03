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
  ), url('img/trailers.webp'); ">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Trailers</h1>
                        <span class="subheading">Lista completa con los trailers de las peliculas del momento</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <!-- <div class="container">
        <div class="row">
            <div class="col">
                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="https://i1.wp.com/teaser-trailer.com/wp-content/uploads/John-Wick-3-Parabellum-French-Poster.jpg" height="460" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">John Wick 3 </h5>
                        <p class="card-text"> <strong>Cast</strong> <br> Keanu Reeves, Halle Berry, Asia Kate Dillon, Ian McShane, Mark Dacasos, Laurence Fishburne, Anjelica Huston<br> <strong>Fecha de Estreno</strong> <br> 15/05/2019</p>
                        <a href="#" class="btn btn-outline-primary btn-block">Ver Trailer</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="http://www.shockya.com/news/wp-content/uploads/disney-a-wrinkle-in-time-movie-poster.jpg" height="460" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">A wrinkle in time</h5>
                        <p class="card-text"><strong>Cast</strong> <br> Oprah Winfrey, Strom Reid, Reese Witherspoon, Mindy Laing, Chris Pine, Levi Miller, Zach Galifianakis <br> <strong>Fecha de Estreno</strong> <br> 22/04/2018</p>
                        <a href="#" class="btn btn-outline-primary btn-block">Ver Trailer</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="https://images-na.ssl-images-amazon.com/images/I/A1GdxURr%2BuL._SY679_.jpg" height="460" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Sicario</h5>
                        <p class="card-text"><strong>Cast</strong><br> Hector Bonilla, Josh Brolin, Emily Blunt, Jeffrey Donovan, Jon Bernthal, Daniel Kaluuya, Raoul Trujillo, Victor Garber <br><strong>Fecha de Estreno</strong><br> 23/07/2018</p>
                        <a href="#" class="btn btn-outline-primary btn-block">Ver Trailer</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
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
                        <!-- <div class="col-xs-3">
                            <p class="page-header"><?php echo $Nombre."&nbsp;/&nbsp;".$Nombre; ?></p>
                            <img src="user_images/<?php echo $row['Imagen']; ?>" class="img-rounded" width="250px" height="250px" />
                            <p class="page-header">
                            <span>
                            <a class="btn btn-info" href="editform.php?edit_id=<?php echo $row['userID']; ?>" title="click for edit" onclick="return confirm('sure to edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
                            <a class="btn btn-danger" href="?delete_id=<?php echo $row['userID']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
                            </span>
                            </p>
                        </div>  -->
                        <div class="col">
                            <div class="card" style="width: 20rem;">
                                <img class="card-img-top" src="posters/<?php echo $row['Imagen']; ?>" height="460" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $Nombre."&nbsp;"?> </h5>
                                    <p class="card-text"> <strong>Cast</strong> <br><?php echo $Actores."&nbsp;"?><br> <strong>Fecha de Estreno</strong> <br><?php echo $Fecha_Estreno."&nbsp;"?></p>
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
                    <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
                    </div>
                </div>
                <?php
                    }
        
                ?>
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