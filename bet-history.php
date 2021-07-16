<?php
use BettingRUs\Models\Database;

require_once "Models/Database.php";
require_once "vendor/autoload.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Betting History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link  rel="stylesheet" type="text/css" href="css/contact-bet-history.css">
    <link  rel="stylesheet" type="text/css" href="css/main.css">
    <meta name="viewport" content="width=device-width">
</head>
<body>

<?php
require 'header.php';
?>
<section>
<h2 class="bet-hist-heading">Betting History</h2>
<div class="bet-hist-form-div">
    <form class="bet-hist-form" method="get" name="form">
            <label for="dateselect">Search Date:</label>
            <input class="bet-hist-form-date-input" type="date" name="dateselect" id="dateselect" >
            <input class="bet-hist-form-date-input" type="date" name="dateselect" id="dateselect" >
            <input class="bet-hist-form-date-input-btn"type="button" name="btn btn-search" value="Search" >
    </form>
</div>
<div class="bet-hist-table-div">
    <table class="bet-hist-table">
        <thead>
        <tr>
        <th>Date</th>
        <th>Bet Name</th>
        <th>Betting Amount</th>
        <th>Earning/Loss</th>
        <th>Bet Won/Lost</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td> 2020/01/01 - 10:00:00</td>
            <td>Harry Potter</td>
            <td>$150</td>
            <td>$300</td>
            <td>Won</td>
        </tr>
        <tr>
            <td> 2020/01/01 - 10:00:00</td>
            <td>John Wick</td>
            <td>$150</td>
            <td>-$150</td>
            <td>Lost</td>
        </tr>
        <tr>
            <td> 2020/01/01 - 10:00:00</td>
            <td>Harry Potter</td>
            <td>$150</td>
            <td>$300</td>
            <td>Won</td>
        </tr>
        </tbody>
    </table>
</div>




</section>
<?php
require 'footer.php';
?>
</body>
</html>
