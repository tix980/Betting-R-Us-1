<?php
use BettingRUs\Models\{Database, MovieInfo};


require_once "vendor/autoload.php";
require_once "Models/Database.php";
require_once "Models/MovieInfo.php";

$db = Database::getDb();

$m = new MovieInfo();
$directors = $m->listDirectors($db);


if ($m) {
//	echo "success";
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
	<title>Directors</title>
</head>
<body>
<div class="container-fluid">
	<?php require_once "Views/header.php"; ?>
	<div id="button">
		<a href="MovieDirectors/add_director.php" class="btn btn-primary">Add</a>
	</div>
	<main class="main">
		<h2 class="heading">Directors</h2>
		<section class="movie" id="movie">
			<ul>
				<?php foreach ($directors as $director){ ?>
					<li class="movie_mainlist"> <img src="images/directors/<?= $director->poster ?>" alt ="director poster" height="150"  width="100"/>
						<?php echo '<div><a name="selectDirector" href="director-info.php?id='.  $director->id . '">'. $director->director_fname . ' '. $director->director_lname . '</a></div>' ?>
					</li>
				<?php };?>
			</ul>
		</section>
	</main>
	<?php require_once "Views/footer.php"; ?>

</div>
<script src="js/jquery.min.js"></script>
<!--<script src="js/popper.min.js"></script>-->
<script src="js/bootstrap.min.js"></script>
<script src="js/movies.js"></script>
</body>
</html>
