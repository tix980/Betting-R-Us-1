<?php
use BettingRUs\Models\{Database, Donation};
require_once "../vendor/autoload.php";
require_once "../Models/Database.php";
require_once "../Models/Donation.php";

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $db = Database::getDb();

    $d = new Donation();
    $count = $d->deleteDonation($id, $db);

    if($count){
        header("Location: list_donation.php");
    } else {
        echo "Problem deleting donation";
    }
}