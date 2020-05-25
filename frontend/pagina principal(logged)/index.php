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
    <script src="js.js"></script>

</head>
<body>

    <?php 

        session_start();

        $_SESSION['user'] = "misterius563";
        $usuario = $_SESSION['user'];
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

            if ($_SESSION['user']==$celda['USERNAME']){

                $contador = 1;

            }

            if ($contador = 0){

                header("Location: http://localhost/dashboard/proyecto/nologged/");
                exit;

            }

        }

        //CONSULTA IMAGEN PERFIL

        $consulta_imagenPerfil = "SELECT IMAGEN_PERFIL FROM USUARIO WHERE USERNAME = '$usuario'";
        $resultado_imagenPerfil = mysqli_query($conn,$consulta_imagenPerfil);

    ?>

<nav class="navbar navbar-expand-xl navbar-light bg-light fixed-top navbar-size shadow-sm">
        <a class="navbar-brand" href="#"><img class="logo" src="../assets/logo.png"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button> 

        <div class="collapse navbar-collapse bg-light" id="navb">
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
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                </form>
                <li class="nav-item mt-1 user-info">             
                        <?php
                            
                            if(!isset($_SESSION)){
                                $userid = $_SESSION["user"];
                                $query = "SELECT USERNAME, IMAGEN_PERFIL FROM USUARIO WHERE ID_USUARIO = '$userid'";

                                if($result = mysqli_query($conn,$query)){
                                    echo "<label class='nav-link'>";
                                    while ($row = mysqli_fetch_row($result)) {
                                        echo "$row[0]<img src='$row[1]' class='rounded-circle z-depth-0 size1 ml-2' alt='avatar image'></label>";
                                    }
                                    echo "</label>";
                                }
                            } else{

                                $query = "SELECT USERNAME, IMAGEN_PERFIL FROM USUARIO WHERE USERNAME = '$usuario'";

                                if($result = mysqli_query($conn,$query)){
                                    echo "<label class='nav-link'>";
                                    while ($row = mysqli_fetch_row($result)) {
                                        echo $row[0]."<img src='$row[1]' class='rounded-circle z-depth-0 size1 ml-2' alt='avatar image'></label>";
                                    }
                                    echo "</label>";
                                }
                                echo "<div><a href='../pagina principal(non-logged)/index.php'>Log Out</a></div>";
                            }

                        ?>
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

            $consulta_wishlist = "SELECT JUEGO.ID_JUEGO ,JUEGO.CARATULA, JUEGO.NOMBRE, JUEGO.GENERO1, JUEGO.FECHA_PUBLICACION, JUEGO.REGION1 FROM JUEGO, JUEGO_USUARIO_WISHLIST WHERE JUEGO_USUARIO_WISHLIST.ID_USUARIO LIKE (SELECT USUARIO.ID_USUARIO FROM USUARIO WHERE USUARIO.USERNAME = '$usuario') AND JUEGO_USUARIO_WISHLIST.ID_JUEGO LIKE JUEGO.ID_JUEGO";
            $resultado_wishlist = mysqli_query($conn,$consulta_wishlist);

            while ($celda = mysqli_fetch_array($resultado_wishlist)){

                ?>

                <form action="../juego/game.php" method="request">

                    <?php

                    echo "<div name=juego value=".$celda['ID_JUEGO']." class=juegos>".
                        "<img class=juego src=".$celda['CARATULA'].">".
                        "<h2> Nombre: ".$celda['NOMBRE']."</h2>".
                        "<h4> Genero: ".$celda['GENERO1']."</h4>".
                        "<h5> Fecha Publicación: ".$celda['FECHA_PUBLICACION']."</h5>".
                        "<h5> Pais: ".$celda['REGION1']."</h5>".
                        "<input type=submit value=Más>".
                        "</div>";

                    ?>

                <form>

                <?php

            } 
            
        ?>

    </div>

    <div class="comentarios">

        <div id="botonAñadirComentario">

            <h1>Feed</h1>

            <input type="button" value="Add Feed" id="btn">

            <div id="añadirReseña" class="cajaInvisible">

        <form action="añadirReseña.php" method="REQUEST">

            <h2>Review</h2>
            <h3>Game:</h3>
            <select name="juegoResena" class="juegoSelect">

                <?php

                    $consulta_juego = "SELECT ID_JUEGO, CARATULA, NOMBRE FROM JUEGO";
                    $resultado_juego = mysqli_query($conn, $consulta_juego);

                    while ($celda = mysqli_fetch_array($resultado_juego)){

                        echo "<option style='background-url:".$celda['CARATULA'].";' value=".$celda['ID_JUEGO'].">".$celda['NOMBRE']."</option>";
        
                    }

                ?>

            </select>

            <h3>Valoración:</h3>

            <textarea name="valoracion" maxlength="100" cols="50">Introduzca su reseña aqui</textarea>

            <input type="submit" value="Enviar Reseña">

        <form>

        </div>

    </div>

        <?php

            $consulta_comentarios = "SELECT usuario.USERNAME,juego.NOMBRE,valoracion_juego_usuario.COMENTARIO
            FROM `usuario`,`valoracion_juego_usuario`,`juego`
            WHERE valoracion_juego_usuario.ID_JUEGO=juego.ID_JUEGO AND valoracion_juego_usuario.ID_USUARIO=usuario.ID_USUARIO;";
            $resultado_comentarios = mysqli_query($conn,$consulta_comentarios);

            while ($celda = mysqli_fetch_array($resultado_comentarios)){
                ?>  
                <div class: style="border-color: green;border-width: 7px;border-bottom-style: solid;">
                    <h2>Usuario</h2>
                    <h4 style="color:blue"><?php echo $celda['USERNAME']?></h4>
                    <h2>Juego</h2>
                    <h4 style="color:blue"><?php echo $celda['NOMBRE']?></h4>
                    <h2>Valoracion</h2>
                    <h4 style="color:blue"><?php echo $celda['COMENTARIO']?></h4>

                </div>

        <?php

            } 

            ?>

    </div>
    
    

    <?php

            //Poner esto al final del código ya que quiera la conexion sql.
            mysqli_close($conn);

    ?>

    
<footer class="page footer center on small only unique color dark pt 8">
		
		<div class="container mt-5 mb-4 text-center text-md-left">
		
			<div class="row ml-3">
			
			<div class="col-ml-3 col-lg-4 col-xl-3 mb-r">
				<h6 class="tittle font-bold"><strong>RetroPanda</strong></h6>
				<hr class="red accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
				<p>La funcion de esta pagina es informar sobre videojuegos retro</p>
			</div>
			
			<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-r">
				<h6 class="tittle font-bold"><strong>Creadores</strong></h6>
				<p><a href="#!">Abraham Diaz Mediavilla</a></p>
				<p><a href="#!">Israel Barrera</a></p>
				<p><a href="#!">Juan Manuel Cardenas Ortega</a></p>
				<p><a href="#!">Antonio Real Chia</a></p>
				<p><a href="#!">Guillermo Rodríguez Gallardo</a></p>
			</div>
			
			<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-r">
				<h6 class="tittle font-bold"><strong>Creadores</strong></h6>
				<p><a href="#!">Numero Telefono: 659664433</a></p>
				<p><a href="#!">Email: RetroPanda@gmail.com</a></p>
				<p><a href="#!">Jerez de la Frontera</a></p>
			</div>
			
		</div>
		
		</footer>

</body>
</html>