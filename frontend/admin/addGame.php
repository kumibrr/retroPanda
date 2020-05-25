<?php

    $userid = $_SESSION["admin"];
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
        $pal = $_REQUEST['pal'];
        $jap = $_REQUEST['jap'];
        $ntsc = $_REQUEST['ntsc'];
        $aus = $_REQUEST['aus'];
        $dev = $_REQUEST['developer'];
        $plat = $_REQUEST['platform'];
    }

    $query = "SELECT DESARROLLADORA.ID_DESARROLLADORA FROM DESARROLLADORA, EMPRESA WHERE DESARROLLADORA.ID_DESARROLLADORA = EMPRESA.ID_EMPRESA AND EMPRESA.NOMBRE_EMPRESA = '$dev'";

    if($result = mysqli_query($connection, $query)){
        $num_rows = mysqli_num_rows($result);

        if($num_rows == 1){
            while($fetch = mysqli_fetch_row($result)){
                $idDev = $fetch[0];
            }
        } else{
            echo "error fatal";
            header("location: adminp.php");
        }
    }

    $query = "INSERT INTO JUEGO(NOMBRE, GENERO1, FECHA_PUBLICACION, REGION1, REGION2, REGION3, REGION4, CARATULA, DESARROLLADORA) VALUES ('$title','$gender','$year-01-01','$pal','$jap','$ntsc','$aus','$cover','$idDev')";

    if(mysqli_query($connection,$query)){
        echo "Añadido correctamente";
        header("location: adminp.php");
    }
?>