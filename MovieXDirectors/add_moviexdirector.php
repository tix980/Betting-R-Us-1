<?php
use BettingRUs\Models\{Database, MovieInfo};

require_once '../vendor/autoload.php';
require_once '../current_bets/currentBetMovieFunction.php';

$s = new MovieInfo();
$movies = $s->listMovies(Database::getDb());
$d = new MovieInfo();
$directors = $d->listDirectors(Database::getDb());
if(isset($_POST['addMoviexDirector'])) {
    $movies = $_POST['movie'];
    $directors = $_POST['director'];
    $db = Database::getDb();
    $b = new MovieInfo();
    $k = $b->addMoviexDirector($movies, $directors, $db);

    if($k){
        echo "success";
    } else {
        echo "problem adding a Movies to director";
    }

}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Add Actor</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link  rel="stylesheet" type="text/css" href="../css/contact-bet-history.css">
    <link  rel="stylesheet" type="text/css" href="../css/main.css">
    <meta name="viewport" content="width=device-width">
</head>
<body>

<div class="current-bet-page" style="margin-top: 2em">
    <h1>Add Movies TO  Directors and Vise Versa</h1>
    <div class="back-btn-container ">
        <a href="../list_directors.php" class="btn-danger">Back to Directors List</a>
        <a href="../list-movies.php" class="btn-danger">Back to Movies List</a>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="director"> Director :</label>
            <select  name="director" class="form-control"
                     id="director" >
                <?php echo  populateDropdownDirector($directors) ?>
            </select>
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="movie"> Movies :</label>
            <select  name="movie" class="form-control"
                     id="movie" >
                <?php echo  populateDropdownMovie($movies) ?>
            </select>
            <span style="color: red">

            </span>
        </div>
        <button type="submit" name="addMoviexDirector" class="btn btn-primary" id="btn-submit">
            Add Directors to Movies
        </button>
    </form>
</div>
</body>
</html>

