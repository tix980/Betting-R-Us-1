<?php
session_start();
use BettingRUs\Models\{Database, PlaceBet};
require_once "Models/Database.php";
require_once "Models/PlaceBet.php";
require_once "vendor/autoload.php";


//var_dump($_SESSION['userid']);
    $dbcon = Database::getDb();
    $b = new PlaceBet();
    $ongoingBets = $b->getPlaceBetsOngoingStatusByUserId($userID, $dbcon);

    $dbme = Database::getDb();
    $d = new PlaceBet();

    $completedBets = $d->getPlaceBetsCompletedStatusByUserId($userID, $dbme);

?>
<section id="bet-history">

<div class="bet-hist-form-div">
    <form class="bet-hist-form" method="get" name="form">
            <label for="dateselect">Search Date:</label>
            <input class="bet-hist-form-date-input" type="date" name="dateselect" id="dateselect" >
            <input class="bet-hist-form-date-input" type="date" name="dateselect" id="dateselect" >
            <input class="bet-hist-form-date-input-btn"type="button" name="btn btn-search" value="Search" >
    </form>
</div>
    <h2 class="bet-hist-heading">Current Bets</h2>
<div class="bet-hist-table-div">
    <table class="bet-hist-table">
        <thead>
        <tr>
        <th>Date</th>
        <th>Bet Movie Name</th>
        <th>Betting Amount</th>
            <th>Bet Type</th>
            <th>Box Office Status</th>
        <th>Earning/Loss</th>
        <th>Bet Won/Lost</th>
            <th>Bet Status</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($ongoingBets as $userOngoingBet) { ?>
        <tr>
            <td><?= $userOngoingBet->date; ?></td>
            <td><?= $userOngoingBet->bet_movie; ?></td>
            <td><?= $userOngoingBet->amount; ?></td>
            <td><?= $userOngoingBet->bet_type; ?></td>
            <td><?= $userOngoingBet->result; ?></td>
            <td><?= $userOngoingBet->earning_loss; ?></td>
            <td><?= $userOngoingBet->bet_won_lost; ?></td>
            <td><?= $userOngoingBet->result_status; ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</section>
<section id="bet-history">

    <h2 class="bet-hist-heading">Past Bets</h2>
    <div class="bet-hist-table-div">
        <table class="bet-hist-table">
            <thead>
            <tr>
                <th>Date</th>
                <th>Bet Name</th>
                <th>Betting Amount</th>
                <th>Bet Type</th>
                <th>Box Office Status</th>
                <th>Earning/Loss</th>
                <th>Bet Won/Lost</th>
                <th>Bet Status</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($completedBets as $userCompletedBet) { ?>
                <tr>
                    <td><?= $userCompletedBet->date; ?></td>
                    <td><?= $userCompletedBet->bet_movie; ?></td>
                    <td><?= $userCompletedBet->amount; ?></td>
                    <td><?= $userCompletedBet->bet_type; ?></td>
                    <td><?= $userCompletedBet->result; ?></td>
                    <td><?= $userCompletedBet->earning_loss; ?></td>
                    <td><?= $userCompletedBet->bet_won_lost; ?></td>
                    <td><?= $userCompletedBet->result_status; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

</section>
<?php
//require 'Views/footer.php';
//?>
<!--</body>-->
<!--</html>-->
