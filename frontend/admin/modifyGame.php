<?php
session_start();
    $userid = $_SESSION["admin"];
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "retropanda";

    $connection = mysqli_connect($servername,$db_username,$db_password,$db_name);

    if(!isset($_SESSION["admin"])){
        $gameID = $_REQUEST['gameid'];
        $title = $_REQUEST['title'];
        $cover = $_REQUEST['cover'];
        $gender = $_REQUEST['gender'];
        $year = $_REQUEST['year'];
        $dev = $_REQUEST['developer'];
        $plat = $_REQUEST['platform'];

        $query = "UPDATE JUEGO SET `NOMBRE` = '$title', `CARATULA` = '$cover', `GENERO1` = '$gender', `FECHA_PUBLICACION` = '$year-01-01', `ID_DESARROLLADORA` = '$dev' WHERE ID_JUEGO = '$gameID'";

    if(mysqli_query($connection,$query)){
        echo "Modificado correctamente";
        header("location: adminp.php");
    }
    } else{
        //header("location: loginadmin.html");
    }
?>