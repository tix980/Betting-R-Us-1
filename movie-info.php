<?php
use BettingRUs\Models\{Database, MovieInfo};

require_once "Views/header.php";
require_once "vendor/autoload.php";

$actorFname=$actorLname=$title="";
$m = new MovieInfo();
$db = Database::getDb();
if($userType == 'admin') {
	$adminBtn = "style='display:block;'";

} else {
	$adminBtn = "style='display:none;'";
}
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
    $actorId = $selectMovie->id;
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
    <main>
      <div class="page-container" style="background:url('<?= $movieBackGround ?>') !important; background-position: center !important; background-repeat: no-repeat !important; background-size: 1200px 801px !important;">
 				<div id="buttons" <?php echo $adminBtn?>>
					<a href="./list-movies.php" class="btn btn-danger float-left">Go back</a>
					<a href="./previous-movie-data.php?id=<?= $id; ?>" class="btn btn-primary">Box Office</a>
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
						<div class="first-name"><a href="actor-info.php?id= <?= $actor-> id;?>"><?php echo $actor-> actor_fname ?></a></div>
						<div class="last-name"><a href= "actor-info.php?id= <?= $actor-> id;?>"><?php echo $actor-> actor_lname ?></a></div>
					</div>
					<?php }; ?>

					<a href="current-bet.php" id="bet-btn">PLACE THE BET NOW!</a>
				</div>
      </div>
    </main>
		<footer><?php require_once "Views/footer.php"; ?></footer>
  </body>
</html>