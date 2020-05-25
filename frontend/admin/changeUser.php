<?php
session_start();
    $userid = $_SESSION["admin"];
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "retropanda";

    $connection = mysqli_connect($servername,$db_username,$db_password,$db_name);

    if(!isset($_SESSION["admin"])){
        $modid = $_REQUEST['modid'];
        $username = $_REQUEST['username'];
        $pass = $_REQUEST['password'];
        $email = $_REQUEST['email'];
        $prof = $_REQUEST['url'];
        $bib = $_REQUEST['bibliografia'];

        $query = "UPDATE USUARIO SET `USERNAME` = '$username', `PASS` = '$pass', `EMAIL` = '$email', `IMAGEN_PERFIL` = '$prof', `BIOGRAFIA` = '$bib' WHERE ID_USUARIO = '$modid'";

    if(mysqli_query($connection,$query)){
        echo "Modificado correctamente";
        header("location: adminp.php");
    }
    } else{
        //header("location: loginadmin.html");
    }
?>