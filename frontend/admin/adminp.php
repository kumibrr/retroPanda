<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../toolbar/toolbar.css">
    <link rel="stylesheet" href="adminp.css">
    <script>
        function modGameSubmit(){
            document.querySelector('.modGame').submit();
        }
    </script>
</head>
<body class="bg-dark">
    <nav class="navbar navbar-expand-xl navbar-light bg-light fixed-top navbar-size shadow-sm">
        <a class="navbar-brand" href="#"><img class="logo" src="../../assets/logo.png"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button> 

        <div class="collapse navbar-collapse bg-light" id="navb">

            <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="nav-item mt-1 user-info">             
                        <?php
                            
                            $userid = $_SESSION["admin"];
                            $servername = "localhost";
                            $db_username = "root";
                            $db_password = "";
                            $db_name = "retropanda";

                            $connection = mysqli_connect($servername,$db_username,$db_password,$db_name);

                            if(!isset($_SESSION["admin"])){
                                $query = "SELECT USERNAME, IMAGEN_PERFIL FROM USUARIO WHERE ID_USUARIO = '$userid' AND ADMIN = TRUE";

                                if($result = mysqli_query($connection,$query)){
                                    echo "<label class='nav-link'>";
                                    while ($row = mysqli_fetch_row($result)) {
                                        echo "$row[0]<img src='$row[1]' class='rounded-circle z-depth-0 size1 ml-2' alt='avatar image'></label>";
                                    }
                                    echo "</label>";
                                }
                            } else{
                                //header("location: loginadmin.html");
                            }
                        ?>
                    
                </li>
            </ul>
        </div>
    </nav>

        <div class="container addGamePanel center">
            <h2>ADD GAME</h2>
            <class class="row">

                <div class="col-sm4">
                    <img class="art" src="https://static.posters.cz/image/750/poster/super-mario-bros-3-nes-cover-i20784.jpg" alt="">
                </div>
                <div class="col-sm4">
                    <div class="addGameForm">
                        <form action="addGame.php">
                            <div class="form-group">
                                <input class="form-control" type="text" name="title" placeholder="Título"><br>
                                <input class="form-control" type="text" name="cover" placeholder="URL Cover">
                                <label>Género:</label>
                                <select class="form-control" name="gender" placeholder="Género">
                                    <option value="ACCIÓN">Acción</option>
                                    <option value="SHOOTER">Shooter</option>
                                    <option value="ESTRATEGIA">Estrategia</option>
                                    <option value="SIMULACION">Simulación</option>
                                    <option value="DEPORTES">Deportes</option>
                                    <option value="CARRERAS">Carreras</option>
                                    <option value="AVENTURAS">Aventuras</option>
                                    <option value="ROL">Rol</option>
                                </select>
                                <label>Year:</label>
                                <select class="form-control" name="year"></select>
                                <label>Región:</label>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" name="pal" value="PAL">PAL
                                      <input type="checkbox" class="form-check-input" name="jap" value="JAP">JAP
                                      <input type="checkbox" class="form-check-input" name="ntsc" value="NTSC">NTSC
                                      <input type="checkbox" class="form-check-input" name="aus" value="AUS">AUS
                                    </label>
                                  </div>
                            </div>
                            <input class="form-control" type="text" name="developer" placeholder="Desarrolladora">
                            <label>Plataforma:</label>
                            <select class="form-control" name="platform"></select>
                        </form>
                        
                    </div>
                    
                </div>
                <div class="col-sm2 submitbtn-area">
                    <button type="button" class="btn btn-primary btn-lg submitbtn">Añadir</button>
                </div>
        </div>

        <div class="container modifyUserPanel center">
            <h2>CHANGE USER INFO</h2>
            <div class="row">

                
                <div class="col-sm4">
                    <div class="changeUserForm">
                        <form action="changeUser.php">
                            <div class="form-group">
                                <select name="user">
                                    
                                </select>
                                <input class="form-control" type="text" name="username" placeholder="Username"><br>
                                <input class="form-control" type="password" name="password" placeholder="Password"><br>
                                <input class="form-control" type="text" name="email" placeholder="E-mail"><br>
                                <input class="form-control" type="text" name="email" placeholder="URL imagen de perfil"><br>
                                <textarea name="bibliografia" cols="32" rows="5" placeholder="Bibliografía"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm4">
                    <img class="profilePic" src="https://static.posters.cz/image/750/poster/super-mario-bros-3-nes-cover-i20784.jpg" alt="">
                </div>
                <div class="col-sm2 submituserbtn-area">
                    <button type="button" class="btn btn-primary btn-lg submituserbtn">Modificar</button>
                </div>
            </div>

        </div>
        
        <div class="container modifyGamePanel center">
            <h2>MODIFY GAME</h2>
            <class class="row">
            <div class="form-group">
                <div class="col-sm4">
                    <?php
                    $id = $_REQUEST['game'];
                    $query = "SELECT CARATULA FROM JUEGO WHERE ID_JUEGO = '$id'";
                    if($result = mysqli_query($connection, $query)){
                        $num_rows = mysqli_num_rows($result);
                        if($num_rows == 1){
                            while($fetch = mysqli_fetch_row($result)){
                                echo "<img class='art' src='$fetch[0]'>";
                            }
                        }
                    }
                    ?>
                        <form action="#" method="post" onchange="submit()">
                            <select class="form-control" name="game">
                            <?php
                                $query = "SELECT ID_JUEGO, NOMBRE FROM JUEGO";

                                if($result = mysqli_query($connection, $query)){
                                    while($row = mysqli_fetch_row($result)){
                                        echo "<option class='form-control' value='$row[0]'>$row[1]</option>";
                                    }
                                }
                            ?>
                            </select>
                        </form>
                    </div>  
                </div>
                <div class="col-sm4">
                    <div class="addGameForm">
                        <form class="modGame" action="modifyGame.php">
                                <!--Example of modifyGame form
                                    <input class="form-control" type="text" name="title" placeholder="Título"><br>
                                <input class="form-control" type="text" name="cover" placeholder="URL Cover">
                                <label>Género:</label>
                                <select class="form-control" name="gender" placeholder="Género">
                                    <option value="ACCIÓN">Acción</option>
                                    <option value="SHOOTER">Shooter</option>
                                    <option value="ESTRATEGIA">Estrategia</option>
                                    <option value="SIMULACION">Simulación</option>
                                    <option value="DEPORTES">Deportes</option>
                                    <option value="CARRERAS">Carreras</option>
                                    <option value="AVENTURAS">Aventuras</option>
                                    <option value="ROL">Rol</option>
                                </select>
                                <label>Year:</label>
                                <select class="form-control" name="year"></select>
                                <label>Región:</label>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" value="PAL">PAL
                                      <input type="checkbox" class="form-check-input" value="JAP">JAP
                                      <input type="checkbox" class="form-check-input" value="NTSC">NTSC
                                      <input type="checkbox" class="form-check-input" value="AUS">AUS
                                    </label>
                                  </div>
                            
                            <label>Plataforma:</label>
                            <select class="form-control" name="platform"></select>-->
                            <?php
                                $id = $_REQUEST['game'];

                                $query = "SELECT NOMBRE, CARATULA, FECHA_PUBLICACION, GENERO1, ID_DESARROLLADORA, REGION1, REGION2, REGION3, REGION4 FROM JUEGO WHERE ID_JUEGO = '$id'";

                                if($result = mysqli_query($connection, $query)){
                                    $num_rows = mysqli_num_rows($result);

                                    if($num_rows == 1){
                                        while($fetch = mysqli_fetch_row($result)){
                                            echo "<input type='text' value='$id' name='gameid' hidden/>";
                                            echo "<input class='form-control' type='text' name='title' placeholder='Título' value='$fetch[0]'></input><br>";
                                            echo "<input class='form-control' type='text' name='cover' placeholder='URL Cover' value='$fetch[1]'></input>";
                                            echo "<label>Género:</label>";
                                            echo "<select class='form-control' name='gender' placeholder='Género'>";
                                                echo "<option value='ACCIÓN'>Acción</option>";
                                                echo "<option value='SHOOTER'>Shooter</option>";
                                                echo "<option value='ESTRATEGIA'>Estrategia</option>";
                                                echo "<option value='SIMULACION'>Simulación</option>";
                                                echo "<option value='DEPORTES'>Deportes</option>";
                                                echo "<option value='CARRERAS'>Carreras</option>";
                                                echo "<option value='AVENTURAS'>Aventuras</option>";
                                                echo "<option value='ROL'>Rol</option>";
                                            echo "</select>";
                                            echo "<label>Year:</label>";
                                            echo "<select class='form-control' name='year'>";
                                            for ($i=1950; $i <= date("Y"); $i++) { 
                                                echo "<option value='$i'>$i</option>";
                                            }
                                            echo "</select>";
                                            echo "<select class='form-control' name='developer'>";
                                                $innerQuery = "SELECT EMPRESA.NOMBRE_EMPRESA, DESARROLLADORA.ID_DESARROLLADORA FROM DESARROLLADORA, EMPRESA WHERE EMPRESA.ID_EMPRESA = DESARROLLADORA.ID_DESARROLLADORA";

                                                if($innerQResult = mysqli_query($connection,$innerQuery)){
                                                    while($fetchInnerQ = mysqli_fetch_row($innerQResult)){
                                                        echo "<option value='$fetchInnerQ[1]'>$fetchInnerQ[0]</option>";
                                                    }
                                                }
                                            echo "</select>";
                                            echo "<label>Plataforma:</label>";
                                            echo "<select class='form-control' name='platform'>";
                                                $innerQuery = "SELECT ID_PLATAFORMA, NOMBRE FROM PLATAFORMA";

                                                if($innerQResult = mysqli_query($connection,$innerQuery)){
                                                    while($fetchInnerQ = mysqli_fetch_row($innerQResult)){
                                                        echo "<option value='$fetchInnerQ[0]'>$fetchInnerQ[1]</option>";
                                                    }
                                                }
                                            echo "</select>";
                                        }
                                    } else{
                                        echo "Unpredicted result";
                                    }
                                }
                            ?>
                        </form>
                        
                    </div>
                    
                </div>
                <div class="col-sm2 submitbtn-area">
                    <button type="button" class="btn btn-primary btn-lg submituserbtn" onclick="modGameSubmit()">Modificar</button>
                </div>
            </div>
        </div>

</body>
</html>