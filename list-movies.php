<?php
use BettingRUs\Models\Database;

require_once "Models/Database.php";
require_once "vendor/autoload.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/movies.css">
    <title>Movies</title>
</head>
<body>
    <div class="container-fluid">
        <?php
        require_once 'header.php';
        ?>
        <main class="main">
        <h2 class="heading">Movies</h2>
        <div class="row">
            <ul class="genre_buttons">
                <li id="romancebtn" class="genre">Romance</li>
                <li id="actionbtn" class="genre">Action</li>
                <li id="fantasybtn" class="genre">Fantasy</li>
                <li id="horrorbtn" class="genre">Horror</li>
                <li id="kidsbtn" class="genre">Kids</li>
                <li id="historicalbtn" class="genre">Historical</li>
            </ul>
        </div>
        <section class="movie" id="movie">
            <ul>
                <li class="movie_mainlist"><img src="images/movie2.jpg" alt ="a movie poster on movie cindrella" height="150"  width="100"/>
                    <div><a href="movie-info.php" >Cindrella</a></div></li>
                <li class="movie_mainlist"><img src="images/movie1.jpg" alt ="a movie poster on movie endless love" height="150" width="100"/>
                    <div><a href="movie-info.php" >Endless Love</a></div></li>
                <li class="movie_mainlist"><img src="images/movie_clapper.png" alt ="a movie poster on movie avengers" height="150" width="100"/>
                    <div><a href="movie-info.php" >Avengers</a></div></li>
                <li class="movie_mainlist"><img src="images/movie1.jpg" alt ="a movie poster on movie x man " height="150" width="100"/>
                    <div><a href="" >X Men</a></div></li>
                <li class="movie_mainlist"><img src="images/movie2.jpg" alt ="a movie poster on movie spider man" height="150" width="100"/>
                    <div><a href="" >Spider man</a></div></li>
                <li class="movie_mainlist"><img src="images/movie2.jpg" alt ="a movie poster on movie cindrella" height="150" width="100"/>
                    <div><a href="" >Romeo & Juliet</a></div></li>
                <li class="movie_mainlist"><img src="images/movie_clapper.png" alt ="a movie poster on movie Titanic" height="150" width="100"/>
                    <div><a href="" >Titanic</a></div></li>
                <li class="movie_mainlist"><img src="images/movie_clapper.png" alt ="a movie poster on movie frozen" height="150" width="100"/>
                    <div><a href="" >Frozen</a></div></li>
                <li class="movie_mainlist"><img src="images/movie1.jpg" alt ="a movie poster on movie lion king" height="150" width="100"/>
                    <div><a href="" >lion king</a></div></li>
                <li class="movie_mainlist"><img src="images/movie2.jpg" alt ="a movie poster on movie Moana" height="150" width="100"/><div>
                        <a href="" >Moana</a></div></li>
                <li class="movie_mainlist"><img src="images/movie2.jpg" alt ="a movie poster on movie Jumbo" height="150" width="100"/><div>
                        <a href="" >Jumbo</a></div></li>
            </ul>
        </section>
        <section id="romance" class="romance">
            <h2 class="genre">Romance</h2>
            <ul class="movielist">
                <li class="moviename"><img src="images/movie2.jpg" alt ="a movie poster on movie cindrella" height="150"  width="100"/>
                    <div><a href="movie-info.php" >Cindrella</a></div></li>
                <li class="moviename"><img src="images/movie1.jpg" alt ="a movie poster on movie endless love" height="150" width="100"/>
                    <div><a href="movie-info.php" >Endless Love</a></div></li>
                <li class="moviename"><img src="images/movie2.jpg" alt ="a movie poster on movie cindrella" height="150" width="100"/>
                    <div><a href="" >Romeo & Juliet</a></div></li>
                <li class="moviename"><img src="images/movie_clapper.png" alt ="a movie poster on movie Titanic" height="150" width="100"/>
                    <div><a href="" >Titanic</a></div></li>
            </ul>
        </section >
        <section id="action" class="action">
            <h2 class="genre">Action</h2>
            <ul class="movielist">
                <li class="moviename"><img src="images/movie_clapper.png" alt ="a movie poster on movie avengers" height="150" width="100"/>
                    <div><a href="movie-info.php" >Avengers</a></div></li>
                <li class="moviename"><img src="images/movie1.jpg" alt ="a movie poster on movie x man " height="150" width="100"/>
                    <div><a href="movie-info.php" >X Men</a></div></li>
                <li class="moviename"><img src="images/movie2.jpg" alt ="a movie poster on movie spider man" height="150" width="100"/>
                    <div><a href="" >Spider man</a></div></li>
            </ul>
        </section>
        <section id="kids" class="kids">
            <h2 class="genre">Kids</h2>
            <ul class="movielist">
                <li class="moviename"><img src="images/movie_clapper.png" alt ="a movie poster on movie frozen" height="150" width="100"/>
                    <div><a href="movie-info.php" >Frozen</a></div></li>
                <li class="moviename"><img src="images/movie1.jpg" alt ="a movie poster on movie lion king" height="150" width="100"/>
                    <div><a href="movie-info.php" >lion king</a></div></li>
                <li class="moviename"><img src="images/movie2.jpg" alt ="a movie poster on movie Moana" height="150" width="100"/><div>
                        <a href="" >Moana</a></div></li>
                <li class="moviename"><img src="images/movie2.jpg" alt ="a movie poster on movie Jumbo" height="150" width="100"/><div>
                        <a href="" >Jumbo</a></div></li>
            </ul>
        </section>
        </main>
        <?php
        require_once 'footer.php';
        ?>

    </div>
    <script src="js/jquery.min.js"></script>
    <!--<script src="js/popper.min.js"></script>-->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/movies.js"></script>
</body>
</html>
