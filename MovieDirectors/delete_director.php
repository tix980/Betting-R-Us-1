<?php

use BettingRUs\Models\{Database, MovieInfo};

require_once "../Models/Database.php";
require_once '../vendor/autoload.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $db = Database::getDb();

    $b = new MovieInfo();
    $count = $b->deleteDirector($id, $db);

    if($count){
        header("Location: ../list-directors.php");
    } else {
        echo "Problem deleting Director";
    }
}