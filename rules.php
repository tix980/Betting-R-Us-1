<?php
use BettingRUs\Models\Database;
use BettingRUs\Models\Rule;

require_once "./Models/Database.php";
require_once "./vendor/autoload.php";

$db = Database::getDb();
$r = new Rule();
$rules = $r->getAllRules(Database::getDb());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/rules.css">
    <title>Rules</title>
</head>
<body>
    <?php
    require './Views/header.php';
    ?>
<div class="container-fluid">
    <main>
        <div class="helper">
        <h2 class="helperheading">How to place a Bet</h2>
        <ul>
            <li>If you want to place a bet first read through the rules and regulations carefully.</li>
            <li>Login to our website so that you can bet</li>
            <li>when you think a movie is a success or flop please click on the place a bet now button</li>
            <li>Fill out the form where you will enter the information on how much you want to bet on.It will be tokens not real money.</li>
            <li>Also enter whether you are betting on a success or flop.</li>
            <li>After placing the bets you can see your bets in your profile.</li>
            <li>We will publish the result after a fixed amount of time.</li>
        </ul>
        </div>
        <h2>Rules and Regulations</h2>
        <ol>
            <?php foreach ($rules as $rule) { ?>
                <li>
                    <?= $rule['rule']; ?>
                </li>
            <?php } ?>
        </ol>
    </main>
    <?php
    require './Views/footer.php';
    ?>
</div><!-- container -->

<script src="../js/jquery.min.js"></script>
<!--<script src="js/popper.min.js"></script>-->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>

