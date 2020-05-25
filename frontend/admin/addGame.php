<?php
session_start();
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "retropanda";

    $connection = mysqli_connect($servername,$db_username,$db_password,$db_name);

    if(!isset($_SESSION["admin"])){
        $title = $_REQUEST['title'];
        $cover = $_REQUEST['cover'];
        $gender = $_REQUEST['gender'];
        $year = $_REQUEST['year'];
        $dev = $_REQUEST['developer'];
        $plat = $_REQUEST['platform'];
        $idDev = $_REQUEST['developer'];
    
        $query = "INSERT INTO JUEGO (NOMBRE, GENERO1, FECHA_PUBLICACION, CARATULA, ID_DESARROLLADORA) VALUES ('$title','$gender','$year-01-01','$cover','$idDev')";
    
        if(mysqli_query($connection,$query)){
            echo "Añadido correctamente";
            header("location: adminp.php");
        } else{
            echo "??";
        }
    } else{
        header("location: loginadmin.html");
    }


?>