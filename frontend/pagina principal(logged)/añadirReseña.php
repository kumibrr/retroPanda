<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "retropanda";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    session_start();

    $usuario = $_SESSION['user'];

    $consulta = "SELECT ID_USUARIO FROM USUARIO WHERE USERNAME = '$usuario'";
    if($result = mysqli_query($conn,$consulta)){
        while ($row = mysqli_fetch_row($result)) {
            $idusuario = $row[0];
        }
    }

    $juego = $_REQUEST['juegoResena'];
    $comentario = $_REQUEST['valoracion'];

    $insercion = "INSERT INTO VALORACION_JUEGO_USUARIO (ID_JUEGO, ID_USUARIO, COMENTARIO) VALUES ($juego, $idusuario, '$comentario')";

    if ($conn->query($insercion) === TRUE) {
        echo "Reseña enviada con exito";
        header("Location: http://localhost/dashboard/proyecto/index.php");
        exit;
    } else {
        echo "Error: ".$insercion."<br>".$conn->error;
    }

    $conn->close();

?>