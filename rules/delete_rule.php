<?php
use BettingRUs\Models\{Database, Rule};
require_once "../Models/Database.php";
require_once "../vendor/autoload.php";

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $db = Database::getDb();

    $r = new Rule();
    $count = $r->deleteRule($id, $db);

    if ($count) {
        header("Location: list_rules.php");

    } else {
        echo "Problem deleting rule";
    }
}


