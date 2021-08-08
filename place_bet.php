<?php
use BettingRUs\Models\Database;
use BettingRUs\Models\PlaceBet;

require_once "./Models/Database.php";
require_once "./vendor/autoload.php";

session_start();
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}
if($_SESSION['accounttype'] ==='admin'){
    header('Location: PlaceBet/list_placed_bets.php');
}
$id = $bet_type =  "";
$db = Database::getDb();
$b = new PlaceBet();
$currentbet = "";
if(isset($_POST['hit'])){

    $id = $_POST['id'];
    $db = Database::getDb();
    $bet_type = 'hit';
    $currentbet = new PlaceBet();
    $getcurrentbet = $currentbet->getCurrentBetById($id, $db);

}
elseif(isset($_POST['flop'])){

    $id = $_POST['id'];
    $db = Database::getDb();
    $bet_type = 'flop';
    $currentbet = new PlaceBet();
    $getcurrentbet = $currentbet->getCurrentBetById($id, $db);

}




elseif(isset($_POST['placeBet'])){
    $amount = $_POST['amount'];
    $userid = $_SESSION['userid'];
    $currentbetid =$_POST['currentbetid'] ;
    $bettype = $_POST['bettype'];

    $db = Database::getDb();
    $bets = $b->addBet($currentbetid, $userid, $amount, $bettype,  $db);

    if ($bets) {
        echo "The bet was placed sucessfully";
        header("Location: user_profile.php");//it should be directed to user profile
    } else {
        echo "Problem adding new bet";
    }
}
else{
    header("Location: current-bet.php");
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
<?php
require './Views/header.php';
?>
<div class="container-fluid">
    <main>
        <div class="addform-container">
        <div><a name="selectMovie" href="movie-info.php?id=<?= $getcurrentbet->movie_id ?>"><img src="<?= $getcurrentbet->movie_background ?>" alt ="movie poster" height="500"  width="75%"/></a></div>
        <h3><?= $getcurrentbet->title ?></h3>
            <h4><?php echo  $_SESSION['userrealname'] ?></h4>
            <form action="" method="post">
                <input type="hidden" name="currentbetid" value="<?= $getcurrentbet->id; ?>" />
                <!--<input type="hidden" name="bettype" value="<?= $bet_type ?>" />-->
            <div class="addbetform">
                <label class="label-add" for="amount">Amount:</label>
                <input type="text" class="select_input" name="amount" id="amount" value="" placeholder="please enter the amount in tokens">
                <span style="color: red">
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
            <a href="./current-bet.php" id="btn_back" class="backbtn">Back</a>
            <button type="submit" name="placeBet"
                    class="button-bet" id="btn-submit">
                Place Bet
            </button>
            </form>
        </div>
    </div>
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