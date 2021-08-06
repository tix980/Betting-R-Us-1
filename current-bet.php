<?php
use BettingRUs\Models\{Database, CurrentBet};

require_once "Models/Database.php";
require_once  "Models/CurrentBets.php";
require_once "vendor/autoload.php";
$hitFlopBtnDisplay ="";
$c = new CurrentBet();
$currentBets = $c->getAllCurrentBets(Database::getDb());


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Current Bets</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link  rel="stylesheet" type="text/css" href="css/contact-bet-history.css">
    <link  rel="stylesheet" type="text/css" href="css/main.css">
    <meta name="viewport" content="width=device-width">
</head>
<body>
<?php include 'Views/header.php'; ?>

<main id="main">
<section id="current-bet">
    <div class="current-bet-heading">
        <h2>Current on-going Bet</h2>
    </div>

    <a href="current_bets/add_current_bets.php" id="btn_addCar" class="btn btn-success btn-lg float-right">Add a Current Bet</a>
    <div class=" container current-bet-container-flex">

        <?php foreach ($currentBets as $currentBet) {

            if($currentBet->bet_status == 'Open'){
                $hitFlopBtnDisplay = "style = 'display:block;'";

            }elseif($currentBet->bet_status =='Closed'){
                $hitFlopBtnDisplay = "style = 'display:none;'";

            }?>

        <div class="current-bet-container">
            <div><a name="selectMovie" href="movie-info.php?id=<?= $currentBet->movie_id ?>"><img src="<?= $currentBet->movie_background ?>" alt ="movie poster" height="200"  width="100%"/></a></div>
        <h3><?= $currentBet->title ?></h3>
        <p class="current-bet-dates">Release Date:<?= $currentBet->release_date ?></p>
        <p class="current-bet-dates bet-closing">Bet Close Date:<?= $currentBet->bet_close_date ?></p>
            <p class="current-bet-dates bet-status">Betting Status:<?= $currentBet->bet_status ?></p>
            <div <?= $hitFlopBtnDisplay ?> >
            <form action="Place_bet.php" method="post">
                <input type="hidden" name="id" value="<?= $currentBet->id ?>"/>
                <input type="submit" class="bet-hit button btn btn-danger" name="hit" value="Box Office Hit"/>
            </form>
            <form action="Place_bet.php" method="post">
                <input type="hidden" name="id" value="<?= $currentBet->id ?>"/>
                <input type="submit" class="bet-flop button btn btn-primary" name="flop" value="Box Office Flop"/>
            </form>
            </div>
            <form action="current_bets/update_current_bets.php" method="post">
                <input type="hidden" name="id" value="<?= $currentBet->id ?>"/>
                <input type="submit" class="button btn btn-primary" name="updateCurrentBet" value="Update"/>
            </form>
            <form action="current_bets/delete_current_bets.php" method="post">
                <input type="hidden" name="id" value="<?= $currentBet->id ?>"/>
                <input type="submit" class="button btn btn-danger" name="deleteCurrentBet" value="Delete"/>
            </form>
        </div>
        <?php

        } ?>

<!--        <div class="current-bet-container">-->
<!--            <h3>Savage Monkey</h3>-->
<!--            <p class="current-bet-dates">Release Date:10th July 2021</p>-->
<!--            <p class="current-bet-dates bet-closing">Bet Close Date:9th July 2021</p>-->
<!--            <div class="current-bet-links">-->
<!--                <a class="bet-hit" href="#">Box-Office Hit</a>-->
<!--                <a class="bet-flop" href="#">Box Office Flop</a>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="current-bet-container">-->
<!--            <h3>Athens Tomorrow</h3>-->
<!--            <p class="current-bet-dates">Release Date:20th July 2021</p>-->
<!--            <p class="current-bet-dates bet-closing">Bet Close Date:19th July 2021</p>-->
<!--            <div class="current-bet-links">-->
<!--                <a class="bet-hit" href="#">Box-Office Hit</a>-->
<!--                <a  class="bet-flop" class="bet-flop" href="#">Box Office Flop</a>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="current-bet-container">-->
<!--            <h3>Tropic Thunder Again!</h3>-->
<!--            <p class="current-bet-dates">Release Date:29th August 2021</p>-->
<!--            <p class="current-bet-dates bet-closing">Bet Close Date:28th August 2021</p>-->
<!--            <div class="current-bet-links">-->
<!--                <a class="bet-hit" href="#">Box-Office Hit</a>-->
<!--                <a class="bet-flop" href="#">Box Office Flop</a>-->
<!--            </div>-->
<!--        </div>-->
    </div>




</section>
</main>





<?php
include 'Views/footer.php';
?>
