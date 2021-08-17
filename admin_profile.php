<?php 
    use BettingRUs\Models\{Database, PlaceBet, MovieInfo, User};
    require_once "vendor/autoload.php";

    $db = Database::getDb();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link  rel="stylesheet" type="text/css" href="css/main.css">
        <title>Profile</title>
    </head>
    <body>
        <?php include "Views/header.php"; ?>
        <main id="userProfileMain">
            <div class="card w-80">
                <div class="row cardProfileImg">
                    <div class="col-md-4 text-center">
                        <img src="./images/user_profile3.png" alt="user profile picture">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h1 class="card-title text-dark">Hello, <?= $userFullName ?>?</h1>
                            <p class="card-text text-dark">Admin Since: <?= $accountage ?></p>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="card">
                <div class="card-header">
                    <ul id="userProfileTabs" class="nav nav-tabs card-header-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button id="infoTab" class="nav-link active" data-bs-toggle="tab" data-bs-target="#personalInfo" type="button" role="tab" aria-controls="personalInfo" aria-selected="true">Personal Informaion</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="userProfileTabContent" class="tab-content">
                <!-- DIV for User's Personal Information -->
                <div id="personalInfo" class="tab-pane fade show active" role="tabpanel" aria-labelledby="infoTab">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><p>Full Name: <?= $userFullName ?></p></li>
                            <li class="list-group-item"><p>Date of Birth: <?= $userdob ?></p></li>
                            <li class="list-group-item"><p>Email Address: <?= $useremail ?></p></li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
        <?php include 'Views/footer.php'; ?>
    </body>
</html>