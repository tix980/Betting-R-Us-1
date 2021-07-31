<?php
use BettingRUs\Models\{Database, Faq};
require_once "../vendor/autoload.php";

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $db = Database::getDb();

    $f = new Faq();
    $count = $f->deleteFaq($id, $db);

    if($count){
        header("Location: list_faq.php");

    } else {
        echo "Problem deleting faq";
    }
}