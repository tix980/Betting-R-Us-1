<?php
use BettingRUs\Models\{Database, MovieInfo};


require_once "vendor/autoload.php";
require_once "Models/Database.php";
require_once "Models/MovieInfo.php";

$db = Database::getDb();


$m = new MovieInfo();
$movies = $m->listMovies($db);


if ($m) {
//	echo "success";
} else {
	echo "problem adding a Request";
}

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
        <?php require_once "header.php"; ?>
        <main>
            <section id="carousel">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./images/bet_friends.jpg" class="d-block w-100" alt="Bet Safely">
                            <div class="carousel-caption d-none d-md-block carouselTxt">
                                <h1>Safe Betting</h1>
                                <p>Feel at ease with our secure and safe betting.</p>
                                <button class="betBtn" type="button" onclick="window.location.href='register.php'">Join Now!</button>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="./images/bet_friends.jpg" class="d-block w-100" alt="new movies">
                            <div class="carousel-caption d-none d-md-block carouselTxt">
                                <h1>New Releases</h1>
                                <p>Bet on upcoming box office releases.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="./images/bet_friends.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block carouselTxt">
                                <h1>Bet with Friends</h1>
                                <p>Have a movie that you and your friends are interested in watching, why not bet to see if it will be abox office hit or flop.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="./images/bet_friends.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block carouselTxt">
                                <h1>Donate</h1>
                                <p>It's always nice to give.</p>
                                <button class="betBtn" type="button" onclick="window.location.href='donations.php'">Donate Today!</button>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </section>
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
                </div>
            </section>
            <section id="testimonials">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="6000">
                    <div class="carousel-inner">
                        <div class="carousel-item active feedback-slider-page">
                            <h2>Great website to use for your betting needs!.</h2>
                            <img class="testimonial-image" src="images/user_profile.png" alt="user testimonial">
                            <em>John Doe, Toronto</em>
                        </div>
                        <div class="carousel-item feedback-slider-page">
                            <h2 class="testimonial-text">Love the odds and the simplicity of this website as the whole experience was seamless</h2>
                            <img class="testimonial-image" src="images/user_profile.png" alt="user testimonial">
                            <em>Cathrina Elizabeth, Ottawa</em>
                        </div>

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </section>
<!--            <section id="testimonial" class="row">-->
<!--                <div class="col">-->
<!--                    <h2>What others got to say about us!</h2>-->
<!--                    <h4>John Doe</h4>-->
<!--                    <p>Great website to use for your betting needs!</p>-->
<!--                </div>-->
<!--                <div class="col">-->
<!--                    <img src="./images/user_profile.png" alt="user's image">-->
<!--                </div>-->
<!--            </section>-->
            <section id="membership" class="row">
                <div class="col">
                    <h2>What are you waiting for!</h2>
                </div>
                <div class="col">
                    <button class="betBtn">Membership</button>
                    <button class="betBtn">FAQ</button>
                </div>
            </section>
        </main>
        <?php require_once "footer.php"; ?>
    </body>
</html>