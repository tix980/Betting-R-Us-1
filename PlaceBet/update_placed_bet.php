<?php
use BettingRUs\Models\Database;
use BettingRUs\Models\PlaceBet;

require_once "../Models/Database.php";
require_once "../vendor/autoload.php";
require_once "../Library/bet-functions.php";


$amount = $bet_movie = $bet_type = "";
$b = new PlaceBet();
$bets = $b->getAllCurrentBets(Database::getDb());

if(isset($_POST['updateBet'])){
    $id= $_POST['id'];

    $db = Database::getDb();

    $placed_bet = new PlaceBet();
    $bet = $placed_bet->getBetWithId($id, $db);
    //var_dump($student);

    $amount =  $bet->amount;
    $username = $bet->username;
    $bet_movie = $bet->bet_movie;
    $bet_type = $bet->bet_type;
    $movie_id = $bet->current_bet_id;


}
if(isset($_POST['updBet'])){
    $id= $_POST['betid'];
    $amount = $_POST['amount'];
    $bet_movie = $_POST['bet_movie'];
    $bettype = $_POST['bettype'];

    $db = Database::getDb();
    $b = new PlaceBet();
    $count = $b->updateBet($id, $amount, $bet_movie, $bettype, $db);

    if($count){
        header('Location:  list_placed_bets.php');
    } else {
        echo "problem";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Bet - Bet Management System</title>
    <meta name="description" content="Student Management System">
    <meta name="keywords" content="Student, College, Admission, Humber">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/placebet.css">

</head>

<body>

<div>
    <!--    Form to Update  Bet -->
    <form action="" method="post">
        <input type="hidden" name="betid" value="<?= $id; ?>" />
        <h2> <?php echo $username; ?> </h2>
        <div class="form-container">
        <div class="betform">
            <label class="label-update" for="amount">Amount:</label>
            <input type="text" class="select_input" name="amount" id="amount" value="<?= $amount; ?>">
            <span style="color: red">
            </span>
        </div>
        <div class="betform">
            <label class="label-update" for="bettype">Bet Type:</label>
            <select  name="bettype" class="select_input"
                     id="bettype" >
                <option>Hit</option>
                <option>Flop</option>
            </select>
            <span style="color: red">
            </span>
        </div>

        <div class="betform">
            <label class="label-update" for="bet_movie">Bet Movie :</label>
            <select  name="bet_movie" class="select_input"
                     id="bet_movie" >
                <?php echo  populateDropdown($bets, $movie_id) ?>
            </select>
            <span style="color: red">
            </span>
        </div>
        <a href="./list_placed_bets.php" id="btn_back" class="backbtn">Back</a>
        <button type="submit" name="updBet"
                class="button-bet" id="btn-submit">
            Update Bet
        </button>
    </form>
</div>
</div>


</body>
</html


