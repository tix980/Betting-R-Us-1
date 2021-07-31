<?php
use BettingRUs\Models\{Database, MovieInfo};


require_once "vendor/autoload.php";
require_once "Models/Database.php";
require_once "Models/MovieInfo.php";

if(isset($_POST['id'])){
	$id=$_POST['id'];
	$db=Database::getDb();
	$m = new MovieInfo();

	$count = $m->deleteMovie($id,$db);
	if($count){
		header("Location: list-movies.php");
	}else{
		echo "something is wrong!";
	}
}