<?php

use BettingRUs\Models\{Database, MovieInfo};


require_once "vendor/autoload.php";
require_once "Models/Database.php";
require_once "Models/MovieInfo.php";

$m = new MovieInfo();
$db = Database::getDb();

if(isset($_POST['addMovie'])){
	$movieTitle = $_POST['title'];
	$movieBudget = $_POST['budget'];
	$movieGross = $_POST['gross'];
	$movieReleaseDate = $_POST['release_date'];
	$rating = $_POST['rating'];
	$summary = $_POST['summary'];
	$genre = $_POST['genre'];

	$count = $m->addMovie($movieTitle, $movieBudget,$movieGross,$movieReleaseDate,$rating,$summary,$genre,$db);

	if($count){
		echo $movieTitle . "  been added to the list";
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
	<title>Add Member</title>
</head>
<body>
<div class="container-fluid">

	<div class="membercontainer">
		<h1>Add Rule</h1>
		<form action="" method="post">
			<div class="formgroup">
				<label class="label" for="title">title :</label>
				<input type="text" id="title" name="title" value="" placeholder="Enter a movie title info" class="formcontrol" />
			</div>
			<div class="formgroup">
				<label class="label" for="budget">budget :</label>
				<input type="text" id = "budget" name="budget" value="" placeholder="Enter a movie budget info" class="formcontrol" />
			</div>
			<div class="formgroup">
				<label class="label" for="gross">gross :</label>
				<input type="text" id="gross" name="gross" value="" placeholder="Enter a movie gross info" class="formcontrol" />
			</div>
			<div class="formgroup">
				<label class="label" for="release-date">release-date :</label>
				<input type="text" id="release-date" name="release_date" value="" placeholder="Enter a movie release date info" class="formcontrol" />
			</div>
			<div class="formgroup">
				<label class="label" for="rating">rating :</label>
				<input type="text" id="rating" name="rating" value="" placeholder="Enter a movie rating info" class="formcontrol" />
			</div>
			<div class="formgroup">
				<label class="label" for="summary">summary :</label>
				<input type="text" id="summary" name="summary" value="" placeholder="Enter a movie summary info" class="formcontrol" />
			</div>
			<div class="formgroup">
				<label class="label" for="genre">genre :</label>
				<input type="text" id="genre" name="genre" value="" placeholder="Enter a movie genre info" class="formcontrol" />
			</div>
			<a href="./list-movies.php" id="btn_back" class="btn btn-success float-left">Back</a>
			<button type="submit" name="addMovie"
							class="btn btn-primary float-right" id="btn-submit">
				Add Movie
			</button>
		</form>
	</div>
