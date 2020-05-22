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
        mysqli_close($conexion) or die("No se ha podido cerrar la conexión $conexion");
        ?>


    </div>
        <br>
    <div style="padding-top:7%;border-bottom:green;">
    <h1  style="text-align:left;color:red">Valoraciones</h1>
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

        $consulta = "
        SELECT usuario.USERNAME,juego.NOMBRE,valoracion_juego_usuario.VALORACION
        FROM `usuario`,`valoracion_juego_usuario`,`juego`
        WHERE valoracion_juego_usuario.ID_JUEGO=juego.ID_JUEGO AND valoracion_juego_usuario.ID_USUARIO=usuario.ID_USUARIO;";

        $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta $consulta");
        while ($mostrar=mysqli_fetch_array($resultado)) {
            ?>
            <div style="border-color: green;border-width: 7px;border-bottom-style: solid;">
                <h2>Usuario</h2>
                <h4 style="color:blue"><?php echo $mostrar['USERNAME']?></h4>
                <h2>Juego</h2>
                <h4 style="color:blue"><?php echo $mostrar['NOMBRE']?></h4>
                <h2>Valoracion</h2>
                <h4 style="color:blue"><?php echo $mostrar['VALORACION']?></h4>

            </div>
        
        <?php
        }
        mysqli_close($conexion) or die("No se ha podido cerrar la conexión $conexion");
        ?>

    
    </div>
</body>
</html>