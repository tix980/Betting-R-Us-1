<?php
    session_start();
    require_once "vendor/autoload.php";

    (string)$userName = $_SESSION['username'];
    date_default_timezone_set("America/Toronto");
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
        <?php include "Views/admin-header.php"; ?>
        <main>
            <section class="adminIndex">
                <div class="text-center">
                    <h1>Welcome to Bets R' Us! <?= $userName ?></h1>
                    <p>Last seen: <?= date("D, m-Y h:i:a") ?></p>
                </div>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card adminCards">
                            <h3 class="card-header adminCardHeader">Users</h3>
                            <div class="card-body">
                                <p class="card-text">Click here to manage the user feature.</p>
                                <a class="btn betBtn" href="Users/list_users.php">Manage Users</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card adminCards">
                            <h3 class="card-header adminCardHeader">Donate</h3>
                            <div class="card-body">
                                <p class="card-text">Click here to manage the donate feature.</p>
                                <a class="btn betBtn" href="Donations/list_donation.php">Manage Donate</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card adminCards">
                            <h3 class="card-header adminCardHeader">Bets</h3>
                            <div class="card-body">
                                <p class="card-text">Click here to manage the bet feature.</p>
                                <a class="btn betBtn" href="current-bet.php">Manage Bets</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card adminCards">
                            <h3 class="card-header adminCardHeader">Movies</h3>
                            <div class="card-body">
                                <p class="card-text">Click here to manage the movie feature.</p>
                                <a class="btn betBtn" href="list-movies.php">Manage Movies</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card adminCards">
                            <h3 class="card-header adminCardHeader">Directors</h3>
                            <div class="card-body">
                                <p class="card-text">Click here to manage the director feature.</p>
                                <a class="btn betBtn" href="list_directors.php">Manage Directors</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card adminCards">
                            <h3 class="card-header adminCardHeader">Actors</h3>
                            <div class="card-body">
                                <p class="card-text">Click here to manage the actor feature.</p>
                                <a class="btn betBtn" href="list-actors.php">Manage Actors</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card adminCards">
                            <h3 class="card-header adminCardHeader">FAQ</h3>
                            <div class="card-body">
                                <p class="card-text">Click here to manage the faq feature.</p>
                                <a class="btn betBtn" href="Faqs/list_faq.php">Manage FAQ</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card adminCards">
                            <h3 class="card-header adminCardHeader">Rules</h3>
                            <div class="card-body">
                                <p class="card-text">Click here to manage the rules feature.</p>
                                <a class="btn betBtn" href="rules/list_rules.php">Manage Rules</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card adminCards">
                            <h3 class="card-header adminCardHeader">Contact</h3>
                            <div class="card-body">
                                <p class="card-text">Click here to manage the contact us feature.</p>
                                <a class="btn betBtn" href="contactUs/list_contactus.php">Manage Contact</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card adminCards">
                            <h3 class="card-header adminCardHeader">Placed Bets</h3>
                            <div class="card-body">
                                <p class="card-text">Click here to manage the place bet feature.</p>
                                <a class="btn betBtn" href="placeBet/list_placed_bets.php">Manage Placed Bets</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php include "Views/admin-footer.php"; ?>
    </body>
</html>
