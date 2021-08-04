<?php
use BettingRUs\Models\{Database, MovieInfo};

require_once "vendor/autoload.php";
require_once "Models/Database.php";
require_once "Models/MovieInfo.php";

$actorFname=$actorLname=$title="";
$m = new MovieInfo();
$db = Database::getDb();
if(isset($_GET['id'])){
	$id=$_GET['id'];

	$m = new MovieInfo();
	$selectMovie = $m->movieInfoFunction($db,$id);

//	var_dump($selectMovie);

	$actorFname = $selectMovie->actorFname;
	$actorLname = $selectMovie->actorLname;
	$title = $selectMovie->movieTitle;
	$releaseDate = $selectMovie->releaseDate;
	$movieBackGround = $selectMovie->movieBackGround;

	$actors = $m->selectActorByMovieId($db,$id);

}

if ($m) {
//	echo "success";
} else {
	echo "problem adding a Request";
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>movie info</title>
		<link href="css/main.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/movie-info.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
	<header>
		<?php require_once "Views/header.php"; ?>
	</header>
    <main>
      <div class="page-container" style="background:url('<?= $movieBackGround ?>') !important; background-position: center !important; background-repeat: no-repeat !important; background-size: 1200px 801px !important;">
 				<div id="buttons">
					<a href="./list-movies.php" class="btn btn-danger float-left">Go back</a>
					<a href="#" class="btn btn-primary">Box Office</a>
					<form action="./admin-update-movie.php" method="POST">
						<input type="hidden" name="id" value="<?= $id;?>" />
						<input type="submit" class="btn btn-secondary" name="updateMovie" value="Update" />
					</form>
					<form  action="admin-delete-movie.php" method="POST">
						<input type="hidden" name="id" value="<?= $id;?>" />
						<input type="submit" style="" class="button btn btn-danger" name="deleteMovie" value="Delete" />
					</form>
				</div>

        <h1 id="movie-title"><?php echo $title ?></h1>
				<div id="release-date">
					<h3>Release Date</h3>
					<p><?php echo $releaseDate; ?></p>
				</div>
				<div class="flex-container">
					<?php foreach ($actors as $actor){?>
					<div class="actor-name">
						<div class="first-name"><a href="#"><?php echo $actor-> actor_fname ?></a></div>
						<div class="last-name"><a href="#"><?php echo $actor-> actor_lname ?></a></div>
					</div>
					<?php }; ?>
<!--					<div class="actor-name">-->
<!--						<div class="first-name"><a href="#">Harrison</a></div>-->
<!--						<div class="last-name"><a href="#">Ford</a></div>-->
<!--					</div>-->
<!--					<div class="actor-name">-->
<!--						<div class="first-name"><a href="#">Carrie</a></div>-->
<!--						<div class="last-name"><a href="#">Fisher</a></div>-->
<!--					</div>-->
<!--					<div class="director-name">-->
<!--						<div class="first-name"><a href="#">George</a></div>-->
<!--						<div class="last-name"><a href="#">Lucas</a></div>-->
<!--					</div>-->
					<a href="#" id="bet-btn">PLACE THE BET NOW!</a>
				</div>
      </div>
    </main>
		<footer><?php require_once "Views/footer.php"; ?></footer>
  </body>
</html>