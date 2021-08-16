<?php
use BettingRUs\Models\Database;
use BettingRUs\Models\PlaceBet;

require_once "../Models/Database.php";
require_once "../vendor/autoload.php";
require_once "../Library/bet-functions.php";
// to get the current bet details from the model
$db = Database::getDb();
$b = new PlaceBet();
$currentbets = $b->getAllCurrentBets(Database::getDb());
//if the user wants to see the bets for this particular movie then select a movie from the dropdown list to view it
$bet_movie = $_GET['bet_movie'] ?? "";
if(isset($_GET['bet_movie'])){
    $bets = $b->getBetsInCurrentBet(Database::getDb(), $_GET['bet_movie']);
} else {
    //get all the bets in the system
    $bets =  $b->getAllBets(Database::getDb());
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/placebet.css">
    <title>List Placed Bets</title>
</head>
<body>
<div class="container-fluid">
    <main>
        <h2>Bet Management System</h2>
        <form action="" method="get">
            <div class="betform">
                <label class="label" for="bet_movie"> Current Bet Movie</label>
                <select  name="bet_movie" class="select_input"
                         id="bet_movie" >
                    <!-- a function to create the drop down of the current bets-->
                    <?php echo  populateDropdown($currentbets, $bet_movie) ?>
                </select>
                <span style="color: red">

            </span>
            </div>
            <input type="submit" class="button-bet" name="betsincurrentbet" value= "Bets In Current Bet " />
        </form>
        <div class="bets_table">
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Bet Movie</th>
                <th>Username</th>
                <th>Bet Status</th>
                <th>Amount</th>
                <th>Bet Type</th>
                <th>Result</th>
                <th>Earnings/Loss</th>
                <th>Bet Won/Lost</th>
                <th>Result Status</th>
                <th>Bet Placed Date</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($bets as $bet) { ?>
                <tr>
                    <td><?= $bet->id?></td>
                    <td><?= $bet->bet_movie; ?></td>
                    <td><?= $bet->username; ?></td>
                    <td><?= $bet->bet_status; ?></td>
                    <td><?= $bet->amount; ?></td>
                    <td><?= $bet->bet_type; ?></td>
                    <td><?= $bet->result; ?></td>
                    <td><?= $bet->earning_loss; ?></td>
                    <td><?= $bet->bet_won_lost; ?></td>
                    <td><?= $bet->result_status; ?></td>
                    <td><?= $bet->date; ?></td>
                    <td><form action="./update_placed_bet.php" method="post">
                            <input type="hidden" name="id" value="<?= $bet->id; ?>"/>
                            <input type="submit" class="button btn btn-primary" name="updateBet" value="Update"/>
                        </form></td>
                    <td><form action="./delete_placed_bet.php" method="post">
                            <input type="hidden" name="id" value="<?= $bet->id; ?>"/>
                            <input type="submit" class="button btn btn-danger" name="deleteBet" value="Delete"/>
                        </form></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
    </main>

</div><!-- container -->

<script src="../js/jquery.min.js"></script>
<!--<script src="js/popper.min.js"></script>-->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>

