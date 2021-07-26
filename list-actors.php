<?php
use BettingRUs\Models\{Database, MovieInfo};


require_once "vendor/autoload.php";
require_once "Models/Database.php";
require_once "Models/MovieInfo.php";

$db = Database::getDb();

$m = new MovieInfo();
$actors = $m->listActors($db);


if ($m) {
	echo "success";
} else {
	echo "problem adding a Request";
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
	<title>Actors</title>
</head>
<body>
<div class="container-fluid">
	<?php
	require_once 'header.php';
	?>
	<div id="button">
		<a href="./admin-add-movie.php" class="btn btn-primary">Add</a>
	</div>
	<main class="main">
		<h2 class="heading">Actors</h2>
		<section class="movie" id="movie">
			<ul>
				<?php foreach ($actors as $actor){ ?>
					<li class="movie_mainlist"> <img src="<?= $actor->poster ?>" alt ="actor poster" height="150"  width="100"/>
						<?php echo '<div><a name="selectMovie" href="movie-info.php?id='.  $actor->id . '">'. $actor->actor_fname . ' '. $actor->actor_lname . '</a></div>' ?>
					</li>
				<?php };?>
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