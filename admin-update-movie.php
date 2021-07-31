<?php

use BettingRUs\Models\{Database, MovieInfo};


require_once "vendor/autoload.php";
require_once "Models/Database.php";
require_once "Models/MovieInfo.php";

$movieTitle=$movieBudget=$movieGross=$movieReleaseDate=$rating=$summary=$genre=$poster=$background="";
$m = new MovieInfo();
$db = Database::getDb();

if(isset($_POST['updateMovie'])){
	$id=$_POST['id'];
	$movie =$m->selectedMovie($id,$db);

	$movieTitle = $movie->title;
	$movieBudget = $movie->budget;
	$movieGross = $movie->gross;
	$movieReleaseDate = $movie->release_date;
	$rating = $movie->rating;
	$summary = $movie->summary;
	$genre = $movie->genre;
	$poster = $movie->poster;
	$background= $movie->movie_background;
}

if(isset($_POST['updMovie'])){
	$id=$_POST['id'];

	$movieTitle = $_POST['title'];
	$movieBudget = $_POST['budget'];
	$movieGross = $_POST['gross'];
	$movieReleaseDate = $_POST['release_date'];
	$rating = $_POST['rating'];
	$summary = $_POST['summary'];
	$genre = $_POST['genre'];
	$poster = $_POST['poster'];
	$background = $_POST['background'];

	$count = $m->updateMovie($id,$movieTitle, $movieBudget,$movieGross,$movieReleaseDate,$rating,$summary,$genre,$poster,$background,$db);
	if($count){
		header("Location: list-movies.php");
	}else{
		echo "something is wrong!";
	}
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
	<link rel="stylesheet" href="css/members.css">
	<title>Update Movie</title>
</head>
<body>
<div class="container-fluid">

	<div class="membercontainer">
		<h1>Update movie</h1>
		<form action="" method="post">
			<input type="hidden" name="id" value="<?= $id; ?>" />
			<div class="formgroup">
				<label class="label" for="title">title :</label>
				<input type="text" id="title" name="title" value="<?= $movieTitle; ?>" placeholder="Enter a movie title info" class="formcontrol" />
			</div>
			<div class="formgroup">
				<label class="label" for="budget">budget :</label>
				<input type="text" id = "budget" name="budget" value="<?= $movieBudget; ?>" placeholder="Enter a movie budget info" class="formcontrol" />
			</div>
			<div class="formgroup">
				<label class="label" for="gross">gross :</label>
				<input type="text" id="gross" name="gross" value="<?= $movieGross; ?>" placeholder="Enter a movie gross info" class="formcontrol" />
			</div>
			<div class="formgroup">
				<label class="label" for="release-date">release-date :</label>
				<input type="text" id="release-date" name="release_date" value="<?= $movieReleaseDate; ?>" placeholder="Enter a movie release date info" class="formcontrol" />
			</div>
			<div class="formgroup">
				<label class="label" for="rating">rating :</label>
				<input type="text" id="rating" name="rating" value="<?= $rating; ?>" placeholder="Enter a movie rating info" class="formcontrol" />
			</div>
			<div class="formgroup">
				<label class="label" for="summary">summary :</label>
				<input type="text" id="summary" name="summary" value="<?= $summary; ?>" placeholder="Enter a movie summary info" class="formcontrol" />
			</div>
			<div class="formgroup">
				<label class="label" for="genre">genre :</label>
				<input type="text" id="genre" name="genre" value="<?= $genre; ?>" placeholder="Enter a movie genre info" class="formcontrol" />
			</div>
			<div class="formgroup">
				<label class="label" for="poster">Movie Poster URL :</label>
				<input type="text" id="poster" name="poster" value="<?= $poster; ?>" placeholder="Enter a movie poster URL info" class="formcontrol" />
			</div>
			<div class="formgroup">
				<label class="label" for="background">Movie Background URL :</label>
				<input type="text" id="background" name="background" value="<?= $background; ?>" placeholder="Enter a movie background URL info" class="formcontrol" />
			</div>
			<a href="./list-movies.php" id="btn_back" class="btn btn-success float-left">Back</a>
			<button type="submit" name="updMovie"
							class="btn btn-primary float-right" id="btn-submit">
				Update Movie
			</button>
		</form>
	</div>

