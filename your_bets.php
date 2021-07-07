<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Your Bets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link  rel="stylesheet" type="text/css" href="css/contact-bet-history.css">
    <link  rel="stylesheet" type="text/css" href="css/main.css">
    <meta name="viewport" content="width=device-width">
</head>
<body>

<?php
require 'header.php';
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
        <th>Bet Name</th>
        <th>Betting Amount</th>
        <th>Earning/Loss</th>
        <th>Bet Won/Lost</th>
            <th>Bet Status</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td> 2020/01/01 - 10:00:00</td>
            <td>Harry Potter</td>
            <td>$150</td>
            <td>0</td>
            <td>TBD</td>
            <td>on-going</td>
        </tr>
        <tr>
            <td> 2020/01/01 - 10:00:00</td>
            <td>John Wick</td>
            <td>$150</td>
            <td>0</td>
            <td>TBD</td>
            <td>on-going</td>
        </tr>
        <tr>
            <td> 2020/01/01 - 10:00:00</td>
            <td>Harry Potter</td>
            <td>$150</td>
            <td>0</td>
            <td>TBD</td>
            <td>on-going</td>
        </tr>
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
                <th>Earning/Loss</th>
                <th>Bet Won/Lost</th>
                <th>Bet Status</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td> 2020/01/01 - 10:00:00</td>
                <td>Harry Potter</td>
                <td>$150</td>
                <td>$300</td>
                <td>Won</td>
                <td>complete</td>
            </tr>
            <tr>
                <td> 2020/01/01 - 10:00:00</td>
                <td>John Wick</td>
                <td>$150</td>
                <td>-$150</td>
                <td>Lost</td>
                <td>complete</td>
            </tr>
            <tr>
                <td> 2020/01/01 - 10:00:00</td>
                <td>Harry Potter</td>
                <td>$150</td>
                <td>$300</td>
                <td>Won</td>
                <td>complete</td>
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
