<?php
use BettingRUs\Models\{Database, MovieInfo};


require_once "../vendor/autoload.php";

if(isset($_POST['id'])){

    $id = $_POST['id'];
    $db = Database::getDb();

    $s = new MovieInfo();
    $count = $s->deleteActorxMovieById($id, $db);
    if($count){
        header("Location: list_moviesxactors.php");
    }
    else {
        echo " problem deleting";
    }


}