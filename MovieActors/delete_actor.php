<?php

use BettingRUs\Models\{Database, MovieInfo};

require_once '../vendor/autoload.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $db = Database::getDb();

    $b = new MovieInfo();
    $count = $b->deleteActor($id, $db);

    if($count){
        header("Location: ../list-actors.php");
    } else {
        echo "Problem deleting Actor";
    }
}