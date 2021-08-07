<?php
use BettingRUs\Models\{Database, PlaceBet};
require_once '../vendor/autoload.php';
//require_once 'Model/Database.php';
//require_once 'Model/Student.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $db = Database::getDb();

    $b = new PlaceBet();
    $count = $b->deleteBet($id, $db);
    if($count){
        header("Location: list_placed_bets.php");
    }
    else {
        echo " problem deleting";
    }


}
