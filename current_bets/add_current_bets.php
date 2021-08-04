<?php
use BettingRUs\Models\{Database, CurrentBet};

require_once "../Models/Database.php";
require_once  "../Models/CurrentBets.php";
require_once '../vendor/autoload.php';
require_once 'currentBetMovieFunction.php';

$b = new CurrentBet();
$movies = $b->getMovie(Database::getDb());
var_dump($_POST);
if(isset($_POST['addCurrentBet'])) {
    $movies = $_POST['movie'];
    $betCloseDate = $_POST['bet-close-date'];
    $betStatus = $_POST['bet-status'];

    $db = Database::getDb();
    $s = new CurrentBet();
    $c = $s->addCurrentBet($movies, $betCloseDate,$betStatus, $db);


    if($c){
        header("Location: ../current-bet.php");
    } else {
        echo "problem adding a Current Bet";
    }

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Current Bets</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link  rel="stylesheet" type="text/css" href="../css/contact-bet-history.css">
    <link  rel="stylesheet" type="text/css" href="../css/main.css">
    <meta name="viewport" content="width=device-width">
</head>
<body>

<div class="current-bet-page" style="margin-top: 2em">
    <h1>Add Current Bets</h1>
    <form action="" method="post">

        <div class="form-group">
            <label for="movie"> Movie :</label>
            <select  name="movie" class="form-control"
                     id="movie" >
                <?php echo  populateDropdown($movies) ?>
            </select>
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="bet-close-date">Bet Close Date:</label>
            <input type="text" class="form-control" name="bet-close-date" id="bet-close-date" placeholder="Bet Close Date">
        </div>
        <div class="form-group">
            <label for="bet-status">Bet Status:</label>
            <input type="text" class="form-control" name="bet-status" id="bet-status" placeholder="Open Or Closed">
        </div>
        <div class="form-group">
            <a href="../current-bet.php" id="btn_back" class="btn btn-success">Back to Current Bets</a>
        </div>
        <button type="submit" name="addCurrentBet" class="btn btn-primary" id="btn-submit">
            Add Current Bet
        </button>

</form>
</div>
</body>
</html>
