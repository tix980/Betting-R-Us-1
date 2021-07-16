<?php
use BettingRUs\Models\Database;

require_once "Models/Database.php";
require_once "vendor/autoload.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Current Bets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link  rel="stylesheet" type="text/css" href="css/contact-bet-history.css">
    <link  rel="stylesheet" type="text/css" href="css/main.css">
    <meta name="viewport" content="width=device-width">
</head>
<body>
<?php
include 'header.php';
?>

<section id="current-bet">
    <div class="current-bet-heading">
        <h2>Current on-going Bets</h2>
    </div>


    <div class=" container current-bet-container-flex">
        <div class="current-bet-container">
        <h3>Harry Potter</h3>
        <p class="current-bet-dates">Release Date:14th August 2021</p>
        <p class="current-bet-dates bet-closing">Bet Close Date:13th August 2021</p>
        <div class="current-bet-links">
        <a class="bet-hit" href="#">Box-Office Hit</a>
        <a class="bet-flop" href="#">Box Office Flop</a>
        </div>
        </div>

        <div class="current-bet-container">
            <h3>Savage Monkey</h3>
            <p class="current-bet-dates">Release Date:10th July 2021</p>
            <p class="current-bet-dates bet-closing">Bet Close Date:9th July 2021</p>
            <div class="current-bet-links">
                <a class="bet-hit" href="#">Box-Office Hit</a>
                <a class="bet-flop" href="#">Box Office Flop</a>
            </div>
        </div>
        <div class="current-bet-container">
            <h3>Athens Tomorrow</h3>
            <p class="current-bet-dates">Release Date:20th July 2021</p>
            <p class="current-bet-dates bet-closing">Bet Close Date:19th July 2021</p>
            <div class="current-bet-links">
                <a class="bet-hit" href="#">Box-Office Hit</a>
                <a  class="bet-flop" class="bet-flop" href="#">Box Office Flop</a>
            </div>
        </div>
        <div class="current-bet-container">
            <h3>Tropic Thunder Again!</h3>
            <p class="current-bet-dates">Release Date:29th August 2021</p>
            <p class="current-bet-dates bet-closing">Bet Close Date:28th August 2021</p>
            <div class="current-bet-links">
                <a class="bet-hit" href="#">Box-Office Hit</a>
                <a class="bet-flop" href="#">Box Office Flop</a>
            </div>
        </div>
    </div>




</section>





<?php
include 'footer.php';
?>
