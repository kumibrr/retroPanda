<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RetroPanda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <nav class="navbar navbar-expand-xl navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button> 

        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Explore</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">My Library</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Emulators</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto nav-flex-icons">
                <form class="form-inline mr-5">
                    <input class="form-control mr-sm-2" type="text">
                </form>
                <li class="nav-item mt-1">
                    <a class="nav-link" href="#">Inciar Sesion</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <div style="text-align:center; padding-top:6%;border-bottom:green;">
    <h1  style="text-align:left;color:red">Wanted</h1>
        <?php
        // Datos de la base de datos
        $usuario = "retropanda";
        $password = "1dam";
        $servidor = "localhost";
        $basededatos = "retropanda";
        
        // creación de la conexión a la base de datos con mysql_connect()
        $conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");

        $resultado = mysqli_query( $conexion, "SET NAMES 'utf8'" ) or die ( "Algo ha ido mal en la consulta");

        // Selección de la base de datos a utilizar
        $db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

        $consulta = "SELECT * FROM JUEGO";

        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta $consulta");
        while ($mostrar=mysqli_fetch_array($resultado)) {
            ?>
            <div style="float:left">
            <img src=<?php echo $mostrar['CARATULA']?> style="width:30%">
            <h2><?php echo $mostrar['NOMBRE']?></h1>
            <h4><?php echo $mostrar['GENERO1']?></p>
            <h5><?php echo $mostrar['FECHA_PUBLICACION']?></p>
            <h5> Pais: <?php echo $mostrar['REGION1']?></p>

            </div>
        
        <?php
        }
        ?>


    </div>

    <div>

    
    </div>
</body>
</html>