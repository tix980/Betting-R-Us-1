<?php

use BettingRUs\Models\{Database, MovieInfo};

require_once "../Models/Database.php";
require_once '../vendor/autoload.php';

if(isset($_POST['deleteMoviexDirector'])) {
    $movie_id = $_POST['movie_id'];
    $director_id = $_POST['director_id'];
    $db = Database::getDb();

    $b = new MovieInfo();
    $count = $b->deleteMoviexDirector($movie_id, $director_id,  $db);

    if ($count) {
        header("Location: ./list_moviesxdirectors.php");
    } else {
        echo "Problem deleting Director";
    }
}