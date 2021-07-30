<?php


$user = 'root';
$password = '';
$dsn ='mysql:host=localhost;dbname=phpteam';

$dbcon = new PDO($dsn, $user, $password);
$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM contact_feedback";

$pdostm = $dbcon->prepare($sql);
$pdostm->setFetchMode(PDO::FETCH_OBJ);
$pdostm->execute();

echo "Connected";
foreach ($pdostm as $car) {
    echo "<li>" . $car->first_name . "</li>";
}
