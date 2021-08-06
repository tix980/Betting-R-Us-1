<?php
    use BettingRUs\Models\{Database, User};
    require_once "../vendor/autoload.php";

    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $db = Database::getDb();

        $userObj = new User();
        $count = $userObj->deleteUser($id, $db);

        if($count) {
            header('Location: list_users.php');
        } else {
            echo "<p>User was not deleted</p>";
        }
    }