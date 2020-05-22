<?php

    $DB_HOST = 'localhost';
    $DB_USER = 'root';
    $DB_PASSWORD = '';
    $DB_NAME = 'retropanda';

    $connection = mysqli_connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME);
    if(mysqli_connect_errno()){
        exit('Failed to connect to database: ' . mysqli_connect_error());
    }

    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $email = $_REQUEST['email'];

    $query = "  INSERT INTO USUARIO (ID_USUARIO, EMAIL, USERNAME, PASS)
                VALUES (NULL, '$email','$username', '$password')
     ";

    if($result = mysqli_query($connection,$query)){


        echo "Registrado correctamente. Redirigiendo...";

        echo "<br><br>Haga <a href='login.html'>click aquí</a> para no esperar.";
        header('Refresh: 2; URL=http://localhost/dashboard/retropanda/frontend/login/login.html');

    }

    mysqli_close($connection);

?>