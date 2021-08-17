<?php
session_start();
require_once "vendor/autoload.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <title>Admin-Bets R' Us</title>
    </head>
    <body>
        <?php include "Views/adm in-header.php"; ?>
        <main>
            <section>
                <h1>Welcome to Betz R' Us!</h1>
                <div class="card-group">
                        <div class="card">
                            <h3 class="card-header">Bets</h3>
                            <div class="card-body">
                                <p class="card-text">Bet information goes here</p>
                                <a class="btn" href="#">View Bets</a>
                            </div>
                        </div>
                        <div class="card">
                            <h3 class="card-header">Bets</h3>
                            <div class="card-body">
                                <p class="card-text">Bet information goes here</p>
                                <a class="btn" href="#">View Bets</a>
                            </div>
                        </div>
                        <div class="card">
                            <h3 class="card-header">Bets</h3>
                            <div class="card-body">
                                <p class="card-text">Bet information goes here</p>
                                <a class="btn" href="#">View Bets</a>
                            </div>
                        </div>
                    </div>
            </section>
        </main>
        <?php include "Views/admin-footer.php"; ?>
    </body>
</html>
