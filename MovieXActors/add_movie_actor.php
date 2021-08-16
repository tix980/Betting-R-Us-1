<?php
use BettingRUs\Models\{Database, MovieInfo};

require_once '../vendor/autoload.php';
require_once '../current_bets/currentBetMovieFunction.php';

var_dump($_POST);
$s = new MovieInfo();
$movies = $s->listMovies(Database::getDb());

$f = new MovieInfo();
$actors = $f->listActors(Database::getDb());
if(isset($_POST['addMovieActor'])) {
    $movies = $_POST['movie'];
    $actors = $_POST['actor'];
    $db = Database::getDb();
    $b = new MovieInfo();
    $k = $b->addMoviexActor($movies, $actors, $db);

    if($k){
        echo "success";
    } else {
        echo "problem adding a Movies to actor";
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
    <h1>Add Movies TO  Actors and Vise Versa</h1>
  <div class="back-btn-container ">
        <a href="../list-actors.php" class="btn-danger">Back to Actors List</a>
        <a href="../list-movies.php" class="btn-danger">Back to Movies List</a>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="actor"> Actor :</label>
            <select  name="actor" class="form-control"
                     id="actor" >
                <?php echo  populateDropdownActor($actors) ?>
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
        <button type="submit" name="addMovieActor" class="btn btn-primary" id="btn-submit">
            Add Actors to Movies
        </button>
    </form>
</div>
</body>
</html>

<!--public  function addMoviexActor($movieId, $actorId, $db){-->
<!--$sql = "INSERT INTO movie_actor(movie_id,actor_id) VALUES(:movieId,:actorId)";-->
<!--$pdostm = $db ->prepare($sql);-->
<!--$pdostm->bindParam(':movieId',$movieId);-->
<!--$pdostm->bindParam(':actorId',$actorId);-->
<!--$count = $pdostm ->execute();-->
<!--return $count;-->
<!--}-->
<!---->
<!--public function listMoviesxactors($db){-->
<!--$sql = "SELECT movies.title, actors.actor_fname,actors.actor_lname FROM movies";-->
<!--$pdostm = $db ->prepare($sql);-->
<!--$pdostm->execute();-->
<!--$m = $pdostm ->fetchAll(\PDO::FETCH_OBJ);-->
<!---->
<!--return $m;-->
<!--}-->
