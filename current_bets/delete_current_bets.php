<?php
use BettingRUs\Models\{Database, CurrentBets};

require_once "../vendor/autoload.php";

if(isset($_POST['id'])) {

    $id = $_POST['id'];
    $db = Database::getDb();

    $s = new CurrentBets();
    $count = $s->deleteCurrentBet($id, $db);
    if ($count) {
        header("Location: ../current-bet.php");
    } else {
        echo " problem deleting";
    }
}

    ?>
