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

    <?php 

        session_start();

        $usuario = "misterius563";
        $_SESSION['USUARIO'] = $usuario;
        $servername = "localhost";
        $database = "retropanda";
        $username = "root";
        $password = "";
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $database);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        //CONSULTA USUARIO

        $consulta_usuario = "SELECT USERNAME FROM USUARIO";
        $resultado_usuario = mysqli_query($conn, $consulta_usuario);

        while ($celda = mysqli_fetch_array($resultado_usuario)){

            if ($_SESSION['USUARIO']==$celda['USERNAME']){

                $usuario = $celda['USERNAME'];

            }
            
            if ($usuario==""){

                header("Location: http://localhost/dashboard/proyecto/nologged/");
                exit;

            }

        }

    ?>

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
                    <label class="nav-link">username<img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle z-depth-0 size1 ml-2" alt="avatar image"></label>
                </li>
            </ul>
        </div>
    </nav>

    <div>

        <br><br><br>

        <h3>WISHLIST</h3>

        <h4 class="titulos">More</h4>

        <?php

            //CONSULTA BASE DE DATOS: WISHLIST 

            $consulta_wishlist = "SELECT J CARATULA, J NOMBRE, J GENERO1, J FECHA_PUBLICACION, J REGION1 FROM J JUEGO, JU JUEGO_USUARIO_WISHLIST WHERE JU ID_USUARIO == (SELECT ID_USUARIO FROM USUARIO WHERE USERNAME == ".$usuario.") AND JU ID_JUEGO == J ID_JUEGO ";
            $resultado_wishlist = mysqli_query($conn,$consulta_wishlist);

            while ($celda = mysqli_fetch_array($resultado_wishlist)){

                echo "<div class=juegos>".
                     "<img src=".$celda['CARATULA'].">".
                     "<h2> Nombre: ".$celda['NOMBRE']."</h2>".
                     "<h4> Genero: ".$celda['GENERO1']."</h4>".
                     "<h5> Fecha Publicación: ".$celda['FECHA_PUBLICACION']."</h5>".
                     "<h5> Pais: ".$celda['REGION1']."</h5>".
                     "</div>";

            } 
            
        ?>

    </div>

    <div id="comentarios">

        <div id="botonAñadirComentario">

            <h3>Feed</h3>

            <input type="button" value="Add Feed">

        </div>

        <?php

            $consulta_comentarios = "SELECT U USERNAME J CARATULA, J NOMBRE, V VALORACION FROM J JUEGO, V JUEGO_USUARIO_VALORACION, U USUARIO WHERE V ID_USUARIO == U ID_USUARIO AND V ID_JUEGO == J ID_JUEGO";
            $resultado_comentarios = mysqli_query($conn,$consulta_comentarios);

            while ($celda = mysqli_fetch_array($resultado_comentarios)){

                echo "<div class=comentario>".
                    "<h2>Usuario</h2>".
                    "<h4>".$celda['USERNAME']."</h4>".
                    "<h2>Juego</h2>".
                    "<img src=".$celda['CARATULA'].">".
                    "<h3> Nombre: ".$celda['NOMBRE']."</h3>".
                    "<h2>Valoracion</h2>".
                    "<p>".$celda['VALORACION']."</p>".
                    "</div>";

            } 

        ?>

    </div>
    
    <div id="añadirComentario" class="cajaInvisible">

        <h2>Review</h2>
        <h3>Game:</h3>
        <select class="juegoSelect">
            <?php

                $consulta_juego = "SELECT ID_JUEGO, CARATULA, NOMBRE FROM JUEGO";
                $resultado_juego = mysqli_query($conn, $consulta_juego);

                while ($celda = mysqli_fetch_array($resultado_comentario)){

                    echo "<option data-icon=".$celda['CARATULA']." value=".$celda['ID_JUEGO'].">".$celda['NOMBRE']."</option>";
    
                }

            ?>
        </select>

        <h3>Valoración:</h3>

        <textarea id="valoracion" maxlength="100" cols="50">Introduzca su reseña aqui</textarea>

    </div>

    <?php

            //Poner esto al final del código ya que quiera la conexion sql.
            mysqli_close($conn);

    ?>

</body>
</html>