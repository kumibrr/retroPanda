<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>toolbar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="toolbar.css">
</head>
<body>
    <nav class="navbar navbar-expand-xl navbar-light bg-light fixed-top navbar-size">
        <a class="navbar-brand" href="#"><img class="logo" src="../../assets/logo.png"></a>
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
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                </form>
                <li class="nav-item mt-1 user-info">             
                        <?php
                            
                            $userid = $_SESSION["user"];
                            $servername = "localhost";
                            $db_username = "root";
                            $db_password = "";
                            $db_name = "retropanda";

                            $connection = mysqli_connect($servername,$db_username,$db_password,$db_name);

                            $query = "SELECT USERNAME, IMAGEN_PERFIL FROM USUARIO WHERE ID_USUARIO = '$userid'";

                            if($result = mysqli_query($connection,$query)){
                                echo "<label class='nav-link'>";
                                while ($row = mysqli_fetch_row($result)) {
                                    echo "$row[0]<img src='$row[1]' class='rounded-circle z-depth-0 size1 ml-2' alt='avatar image'></label>";
                                }
                                echo "</label>";
                            }
                            mysqli_close($connection);
                        ?>
                    
                </li>
            </ul>
        </div>
    </nav>
    
</body>
</html>