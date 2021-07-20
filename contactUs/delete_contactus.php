<?php
use BettingRUs\Models\{Database, ContactFeedback};

require_once "../Models/Database.php";
require_once "../Models/ContactFeedback.php";
require_once "../vendor/autoload.php";

if(isset($_POST['id'])){

    $id = $_POST['id'];
    $db = Database::getDb();

    $s = new ContactFeedback();
    $count = $s->deleteContactFeedback($id, $db);
    if($count){
        header("Location: list_contactus.php");
    }
    else {
        echo " problem deleting";
    }


}
