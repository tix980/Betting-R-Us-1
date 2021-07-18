<?php

$dbname = "tix980_betting-r-us";
$user = 'tix980_notyolo';
$password = 'justfomo';

$dsn = "mysql:host=localhost:3306;dbname=$dbname";

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
?>