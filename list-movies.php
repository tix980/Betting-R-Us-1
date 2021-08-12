<?php
use BettingRUs\Models\{Database, MovieInfo, Genre};


require_once "vendor/autoload.php";
 require_once "Models/Database.php";
 require_once "Models/MovieInfo.php";

$db = Database::getDb();


$m = new MovieInfo();
//$movies = $m->listMovies($db);
$g = new Genre();
$genres = $g->getAllGenre($db);

$genre="";
if(isset($_POST['romance'])){
    $genre = $_POST['romance'];
    $movies= $g->getMoviesInGenre($db, $genre);
}
elseif(isset($_POST['horror'])){
    $genre = $_POST['horror'];
    $movies= $g->getMoviesInGenre($db, $genre);
}
elseif(isset($_POST['kids'])){
    $genre = $_POST['kids'];
    $movies= $g->getMoviesInGenre($db, $genre);
}
elseif(isset($_POST['fantasy'])){
    $genre = $_POST['fantasy'];
    $movies= $g->getMoviesInGenre($db, $genre);
}
elseif(isset($_POST['Sci-fi'])){
    $genre = $_POST['Sci-fi'];
    $movies= $g->getMoviesInGenre($db, $genre);
}
elseif(isset($_POST['action'])){
    $genre = $_POST['action'];
    $movies= $g->getMoviesInGenre($db, $genre);
}
elseif(isset($_POST['comedy'])){
    $genre = $_POST['comedy'];
    $movies= $g->getMoviesInGenre($db, $genre);
}
else{
 $movies= $m->listMovies($db);}


if ($m) {
	// echo "success";
} else {
	echo "problem adding a Request";
}
if ($genres) {
    // echo "success";
} else {
    echo "problem getting all genres";
}

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
        require_once 'Views/header.php';
        ?>
			<div id="button">
				<a href="./admin-add-movie.php" class="btn btn-primary">Add</a>
			</div>
        <main class="main">
        <h2 class="heading">Movies</h2>
        <div class="row">
            <ul class="genre_buttons">

                <?php foreach ($genres as $genre){ ?>
                    <li class="genre">
                        <form action="" method="post">
                            <input type="hidden" name="<?= $genre->genre ?>" value="<?= $genre->genre ?>"/>
                            <input type="submit" class="genrebtn" name="<?= $genre->genre ?> " value="<?= $genre->genre ?> "/>
                        </form>
                    </li>
                <?php };?>
            </ul>
        </div>
        <section class="movie" id="movie">
					<ul>
						<?php foreach ($movies as $movie){ ?>
						<li class="movie_mainlist"> <img src="<?= $movie->poster ?>" alt ="movie poster" height="150"  width="100"/>
							<?php echo '<div><a name="selectMovie" href="movie-info.php?id='.  $movie->id . '">'. $movie->title . '</a></div>' ?>
						</li>
						<?php };?>
					</ul>
        </section>
        </main>
        <?php
        require_once 'Views/footer.php';
        ?>

    </div>
    <script src="js/jquery.min.js"></script>
    <!--<script src="js/popper.min.js"></script>-->
    <script src="js/bootstrap.min.js"></script>
<!--    <script src="js/movies.js"></script>-->
</body>
</html>
