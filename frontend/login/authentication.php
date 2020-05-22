<?php
session_start();

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASSWORD = '';
$DB_NAME = 'RETROPANDA';

$connection = mysqli_connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME);
if(mysqli_connect_errno()){
    exit('Failed to connect to database: ' . mysqli_connect_error());
}

if(!isset($_REQUEST['username'], $_REQUEST['password'])){
    exit('Username or password are wrong');
}
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$query = "SELECT ID_USUARIO FROM USUARIO WHERE USUARIO.USERNAME = '$username' AND USUARIO.PASS = '$password'";

if($result = mysqli_query($connection,$query)){
    
    $row = mysqli_num_rows($result);
    
    if($row == 1){
        session_start();
        while($fetch = mysqli_fetch_row($result)){
            $_SESSION["user"] = $fetch[0];
        }
        header("location: ../toolbar/toolbar.php");
    } else {
        echo "El usuario o contraseña no son correctos.";
        echo "<br><br><a href='login.html'>Volver</a>";
    }
} else{
    echo "ha fallado algo :( " .mysqli_error($connection);
}

mysqli_close($connection);
?>