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
    <link rel="stylesheet" href="../toolbar/toolbar.css">
    <link rel="stylesheet" href="game.css">
    <script>
        function addToLibrary(){
            document.querySelector('.addToLibrary').submit();
        }
        function addToWishlist(){
            document.querySelector('.addToWishlist').submit();
        }
    </script>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-xl navbar-light bg-light fixed-top navbar-size shadow-sm">
        <a class="navbar-brand" href="#"><img class="logo" src="../../assets/logo.png"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button> 

        <div class="collapse navbar-collapse bg-light" id="navb">
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
                        ?>
                    
                </li>
            </ul>
        </div>
    </nav>

    <div class="row">

        <div class="col-sm3 cover">

            <!--Example of cover:
                <img class="art" src="https://static.posters.cz/image/750/poster/super-mario-bros-3-nes-cover-i20784.jpg" alt="">
            <br><br>
            <h3>Developer: Nintendo</h3>
            <h3>Publisher: Nintendo</h3>-->

            <?php
                $idJuego = $_REQUEST['$idJuego'];
                $query = "SELECT CARATULA, ID_DESARROLLADORA FROM JUEGO WHERE ID_JUEGO = '$idJuego'";
                if($response = mysqli_query($connection, $query)){
                    while ($row = mysqli_fetch_row($response)) {
                        echo "<img class='art' src='$row[0]'>";
                        echo "<br><br>";
                        echo "<h3>Developer: $row[1]</h3>";
                    }
                }
            ?>
            <button class="btn btn-primary" onclick="addToLibrary()">Añadir a mi librería</button>
            <button class="btn btn-secondary" onclick="addToWishlist()">Añadir a mi WhishList</button>
        </div>
        <div class="col-sm3 info">
            <!--Example of info
                <h2>Super Mario World 3 (1996)</h2>
            <h3>SNES(JAP)(PAL)(NTSC)</h3>
            <br>
            <h5>
                Super Mario Bros. 3 is a platform action-adventure game for the Famicom and NES and is officially the third installment in the Super Mario series. It was released in Japan on October 23, 1988, in North America on February 9, 1990, and in Europe and Australia on August 29, 1991. It was later released in the US on the Wii's Virtual Console in 2007, the 3DS's Virtual Console in early 2013, and the Wii U's Virtual Console in late 2013. It was also remade for the 1993 SNES compilation game Super Mario All-Stars, and for the Game Boy Advance in 2003 as Super Mario Advance 4: Super Mario Bros. 3, the final installment of the Super Mario Advance series. It was also released as a reward that Club Nintendo users could purchase with their coins for the Wii Virtual Console on June 3, 2013.

                Super Mario Bros. 3 has been considered one of the greatest games of all time, with its huge success attributed to its complexity and challenging levels. The game introduces six new power-ups: the Super Leaf, the Tanooki Suit, the Magic Wing, the Frog Suit, the Hammer Suit, and Goomba's Shoe. It also features new moves, items and enemies. It also features special non-level parts of each world: Toad Houses, where items can be obtained, and Spade Panels, where lives can be obtained, as well as rarer areas such as the White Mushroom House and the Treasure Ship.
                
                Shortly after the release of the game, a cartoon named The Adventures of Super Mario Bros. 3 was made. The cartoon was based on the game, but with a different plot. In the cartoons, King Koopa and the Koopalings tried to take over the real world as well as the Mushroom Kingdom. The cartoon series was produced by DIC Entertainment Productions in association with Nintendo.
            </h5>-->
            <?php
                $query = "SELECT JUEGO.NOMBRE, YEAR(JUEGO.FECHA_PUBLICACION), PLATAFORMA.NOMBRE, JUEGO.REGION1, JUEGO.REGION2, JUEGO.REGION3, JUEGO.REGION4, JUEGO.GENERO1, JUEGO.DESCRIPCION
                FROM JUEGO, PLATAFORMA, PLATAFORMA_JUEGO WHERE JUEGO.ID_JUEGO = '$idJuego' AND PLATAFORMA_JUEGO.ID_JUEGO = '$idJuego' AND PLATAFORMA.ID_PLATAFORMA = PLATAFORMA_JUEGO.ID_PLATAFORMA";
                if($response = mysqli_query($connection, $query)){
                    while($row = mysqli_fetch_row($response)){
                        echo "<h2>$row[0] ($row[1])</h2>";
                        echo "<h3>$row[2] ($row[3])($row[4])($row[5])($row[6])($row[7])</h3>";
                        echo "<h3>$row[8]</h3>";
                        echo "<br><h5>$row[9]</h5>";
                        $genero = $row[8];
                    }
                }
            ?>

        </div>
        <div class="col-sm3 related-games">
            <h3>Related games:</h3>
            <!--Example related games:
            <img class="related-art" src="https://upload.wikimedia.org/wikipedia/en/0/00/Super_Mario_Bros_2.jpg" alt="">
            <img class="related-art" src="https://upload.wikimedia.org/wikipedia/en/0/00/Super_Mario_Bros_2.jpg" alt="">
            <img class="related-art" src="https://upload.wikimedia.org/wikipedia/en/0/00/Super_Mario_Bros_2.jpg" alt="">
            <br>
            <img class="related-art" src="https://upload.wikimedia.org/wikipedia/en/0/00/Super_Mario_Bros_2.jpg" alt="">
            <img class="related-art" src="https://upload.wikimedia.org/wikipedia/en/0/00/Super_Mario_Bros_2.jpg" alt="">
            <img class="related-art" src="https://upload.wikimedia.org/wikipedia/en/0/00/Super_Mario_Bros_2.jpg" alt="">-->
            <?php
                $query = "SELECT CARATULA FROM JUEGO WHERE GENERO = '$genero'";
                if($response = mysqli_query($connection,$query)){
                    while($row = mysqli_fetch_row($response)){
                        $count = 1;
                        foreach($row as $caratula){
                            if ($count < 16){
                                if($count/3 == 0){
                                    echo "<br>";
                                }
                                echo "<img class='related-art' src='$row[0]'";
                                $count++;
                            }
                        }
                    }
                }
            ?>
        </div>
        <div class="col-sm3 comment-section">
        <h3>Comments:</h3>
            <!--Comment section example
                
            <div class='single-comment'>
                <img src='' alt='avatar image'>
                <b>user5160</b>
                <h5>A mi me ha gustado mucho este juego, es muy bonito y bastante divertido.</h5>
            </div>-->
            
            <?php
                $query = "SELECT VALORACION_JUEGO_USUARIO.COMENTARIO, USUARIO.USERNAME FROM USUARIO, VALORACION_JUEGO_USUARIO WHERE VALORACION_JUEGO_USUARIO.ID_JUEGO = '$idJuego' AND USUARIO.ID_USUARIO = VALORACION_JUEGO_USUARIO.ID_USUARIO";

                if($response = mysqli_query($connection, $query)){
                    while($row = mysqli_fetch_row($response)){
                        foreach($row as $comentario){
                            echo "<div class='single-comment'>";
                            echo "<b>$row[1]:</b>";
                            echo "<h5>$row[0]</h5>";
                        }
                    }
                }
            ?>

        </div>

        <form class="addToLibrary" action="addGametoLibrary.php" method="post" hidden>
            <input type="text" value="game-id">
        </form>
        <form class="addToWishlist" action="addGametoWishList.php" method="post" hidden>
            <input type="text" value="game-id">
        </form>

    </div>
    
</body>
</html>