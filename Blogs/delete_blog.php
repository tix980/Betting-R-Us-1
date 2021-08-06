<?php
use BettingRUs\Models\{Database, Blog};
require_once "../vendor/autoload.php";

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $db = Database::getDb();

    $b = new Blog();
    $count = $b->deleteBlog($id, $db);

    if($count){
        header("Location: list_blog.php");
    } else {
        echo "Problem deleting blog";
    }
}