<?php
    session_start();

    use BettingRUs\Models\{Database, MovieInfo};
    require_once "vendor/autoload.php";

    $userID = $_SESSION['userid'];
    $username = $_SESSION['username'];
    $userType = $_SESSION['accounttype'];
    $userFullName = $_SESSION['userrealname'];


    $db = Database::getDb();


    $m = new MovieInfo();
    $movies = $m->listMovies($db);

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
        <title>Bets R' Us</title>
    </head>
    <body>
        <?php require_once "Views/header.php"; ?>
        <main>
            <?php require_once 'home-page-carousal.php'; ?>
            <section id="lastMinBets">
                <h2>Last Minute Bets</h2>
                <div class="row">
					<?php foreach ($movies as $movie){ ?>
                    <div class="col">
                        <div class="card betsCard bg-transparent">
                            <img class="card-img-top" src="<?= $movie->movie_background ?>" alt ="movie poster" height="150"  width="100"/>
                            <div class="card-img-overlay text-center lastBetsTxt">
                                <h3><?= $movie->title ?></h3>
                                <button class="betBtn" type="button">Bet Now!</button>
                            </div>
                        </div>
                    </div>
					<?php };?>
                </div>
            </section>
            <section id="leaderBoard" class="row">
                <div class="col">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item leaderboardTxt" role="presentation">
                           <button class="nav-link active" id="highPayoutTab" data-bs-toggle="tab" data-bs-target="#highPayout" type="button" role="tab" aria-controls="highPayout" aria-selected="true">Highest Payouts</button>
                        </li>
                        <li class="nav-item leaderboardTxt" role="presentation">
                            <button class="nav-link" id="topUsersTab" data-bs-toggle="tab" data-bs-target="#topUser" type="button" role="tab" aria-controls="topUser" aria-selected="true">Top Users</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="highPayout" role="tabpanel" aria-labelledby="highPayoutTab">
                            <div class="payoutList">
                                <ol>
                                    <li>
                                        <img class="listImg" src="./images/movie_clapper.png" alt="Movie poster image">
                                        <p class="listTxt">A Quiet Place Part 2 - $20,000</p>
                                    </li>
                                    <li>
                                        <img class="listImg" src="./images/movie_clapper.png" alt="Movie poster image">
                                        <p class="listTxt">Cruella - $10,000</p>
                                    </li>
                                    <li>
                                        <img class="listImg" src="./images/movie_clapper.png" alt="Movie poster image">
                                        <p class="listTxt">Spiral - $5,000</p>
                                    </li>
                                    <li>
                                        <img class="listImg" src="./images/movie_clapper.png" alt="Movie poster image">
                                        <p class="listTxt">The Little Things - $2,500</p>
                                    </li>
                                    <li>
                                        <img class="listImg" src="./images/movie_clapper.png" alt="Movie poster image">
                                        <p class="listTxt">Awake - $2,000</p>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="topUser" role="tabpanel" aria-labelledby="topUsersTab">
                            <div class="topUserList">
                                <ol>
                                    <li>
                                        <img class="listImg" src="./images/user_profile.png" alt="User's Profile Image">
                                        <p class="listTxt">Capricornmild</p>
                                    </li>
                                    <li>
                                        <img class="listImg" src="./images/user_profile2.png" alt="User's Profile Image">
                                        <p class="listTxt">Hauntingcapricious</p>
                                    </li>
                                    <li>
                                        <img class="listImg" src="./images/user_profile3.png" alt="User's Profile Image">
                                        <p class="listTxt">Repeatedlycrease</p>
                                    </li>
                                    <li>
                                        <img class="listImg" src="./images/user_profile.png" alt="User's Profile Image">
                                        <p class="listTxt">Teamcapacity</p>
                                    </li>
                                    <li>
                                        <img class="listImg" src="./images/user_profile2.png" alt="User's Profile Image">
                                        <p class="listTxt">Impossibletailor</p>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h2>Leadership Board</h2>
                    <p>Checkout the top five users with the highest amount of money and best betting average. You can also see the movies with the highest payouts.</p>
                </div>
            </section>
            <section id="featuredMovies">
                <h2>Featured Movies</h2>
                <p class="text-center">Here are a few of the movies that we feature to bet on.</p>
                <div class="container-fluid">
                    <div class="row">
						<?php foreach ($movies as $m){ ?>
                        <img class="col" src="<?= $m->movie_background ?>" alt ="movie poster" height="350"  width="100"/>
						<?php };?>
                    </div>
                    <div class="row">
                        <a class="btn betBtn" href="list-movies.php">View All Movies</a>
                </div>
            </section>
<!--            HOMEPAGE TESTIMONIAL CARAOUSAL-->
            <?php require_once 'homepage_testimonials.php'?>

            <section id="membership" class="row">
                <div class="col">
                    <h2>What are you waiting for!</h2>
                </div>
                <div class="col">
                    <button class="betBtn" onclick="window.location.href='join_membership.php'">Membership</button>
                    <button class="betBtn" onclick="window.location.href='faq.php'">FAQ</button>
                </div>
            </section>
        </main>
        <?php require_once "Views/footer.php"; ?>
    </body>
</html>
