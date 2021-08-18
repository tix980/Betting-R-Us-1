<?php
use BettingRUs\Models\{Database, PlaceBet, Currency};

require './Views/header.php';
require_once  "./PlaceBet/bet_validation.php";
require_once "./vendor/autoload.php";

//if the user is not login then redirect to login page
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}
//if the user is admin they cannot bet ,they will be redirected to the list of bets placed by the users
if($_SESSION['accounttype'] === 'admin'){
    header('Location: PlaceBet/list_placed_bets.php');
}
else {
    $id = $bet_type = $errors = "";
    $db = Database::getDb();
    $b = new PlaceBet();
    $currentbet = "";
    //get the data from the current bet
    if (isset($_POST['hit'])) {

        $id = $_POST['id'];
        $db = Database::getDb();
        $bet_type = 'hit';
        $currentbet = new PlaceBet();
        //to get the current bet details from the model placebet
        $getcurrentbet = $currentbet->getCurrentBetById($id, $db);

    } elseif (isset($_POST['flop'])) {

        $id = $_POST['id'];
        $db = Database::getDb();
        $bet_type = 'flop';
        $currentbet = new PlaceBet();
        $getcurrentbet = $currentbet->getCurrentBetById($id, $db);
    //when the user clicks on the place bet they can bet on the movie chosen by them
    } elseif (isset($_POST['placeBet'])) {
        $amount = isset($_POST['amount']) ? $_POST['amount'] : "";
        $errors = validateBetForm($amount, $errors);
        if (empty($errors)) {
            $amount = $_POST['amount'];
            $userid = $_SESSION['userid'];
            $currentbetid = $_POST['currentbetid'];
            $bettype = $_POST['bettype'];
            $id = $_SESSION['userid'];
            $wallet = "";
            $c = new Currency();
            $db = Database::getDb();
            //if there are not enough tokens in the wallet then will be redirected to the converter
            $wallet = $c->selectedWallet($id, $db);
            $token = ($wallet->token) - ($amount);
            $cad = $wallet->canadian_dollars;
            if ($wallet->token < $amount) {
                header('location:./currency-convert.php');
            } else {

                $db = Database::getDb();

                //update the wallet with the money and token
                $newwallet = $c->updateWallet($id, $cad,$token, $db);
                $bets = $b->addBet($currentbetid, $userid, $amount, $bettype, $db);
                //if it is successful in placing a bet the user can see the bet in the user profile
                if ($bets) {
                    header("Location: user_profile.php");//it should be directed to user profile
                } else {
                    echo "Problem adding new bet";
                }
            }
        }
    }
    else {
            header("Location: current-bet.php");

    }
}



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
    <link rel="stylesheet" href="./css/placebet.css">
    <title>Place Bet</title>
</head>
<body>
<div class="container-fluid">
    <main>
        <div class="addform-container">
          <div class="movieimage">
            <a name="selectMovie" href="movie-info.php?id=<?= $getcurrentbet->movie_id ?>">
                <img src="<?= $getcurrentbet->movie_background ?>" alt ="movie poster" height="500"  width="75%"/>
            </a>
          </div>
          <div class="moviedetails">
            <h3 class="movietitle"><?= $getcurrentbet->title ?></h3>
            <h4 class="username"><?php echo  $_SESSION['userrealname'] ?></h4>
            <form action="" method="post">
                <input type="hidden" name="currentbetid" value="<?= $getcurrentbet->id; ?>" />
                <div class="addbetform">
                <label class="label-add" for="amount">Amount:</label>
                <input type="text" class="select_input" name="amount" id="amount" value="<?= isset($amount) ? $amount: ""; ?>" placeholder="please enter the amount in tokens">
                <span style="color: red" > <?php //echo $err ?>
                </span>
                </div>
                <div class="addbetform">
                    <label class="label-add" for="bettype">Bet Type:</label>
                    <select  name="bettype" class="select_input"
                             id="bettype" >
                        <option>Hit</option>
                        <option>Flop</option>
                    </select>
                    <span style="color: red">
                    </span>
                </div>
                <a href="./current-bet.php" id="btn_back" class="backbetbtn">Back</a>
                <button type="submit" name="placeBet"
                    class="button-bet" id="btn-submit">Place Bet
                </button>
            </form>
          </div>
        </div>
    </main>
</div>
    <?php
    require './Views/footer.php';
    ?>
</div><!-- container -->

<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>