<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link  rel="stylesheet" type="text/css" href="css/main.css">
        <title>Bets R' Us</title>
    </head>
    <body>
        <?php require_once "header.php"; ?>
        <main>
            <section>
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
                <div>
                    <img src="" alt="">
                    <div>
                        <h3>Movie Title</h3>
                        <button class="betBtn" type="button">Bet Now!</button>
                    </div>
                </div>
            </section>
            <section id="leaderBoard" class="row">
                <div class="col">
                    <div class="payoutList">
                        <h3 class="listTitle">Highest Payouts</h3>
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
                    <div class="topUserList">
                        <h3 class="listTitle">Top Users</h3>
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
                <div class="col">
                    <h2>Leadership Board</h2>
                    <p>Checkout the top five users with the highest amount of money and best betting average. You can also see the movies with the highest payouts.</p>
                </div>
            </section>
            <section id="featuredMovies">
                <h2>Featured Movies</h2>
                <p class="text-center">Here are a few of the movies that we feature to bet on.</p>
                <div>
                    <img src="./images/movie_clapper.png" alt="Movie poster image">
                    <img src="./images/movie_clapper.png" alt="Movie poster image">
                    <img src="./images/movie_clapper.png" alt="Movie poster image">
                </div>
                <div>
                    <img src="./images/movie_clapper.png" alt="Movie poster image">
                    <img src="./images/movie_clapper.png" alt="Movie poster image">
                    <img src="./images/movie_clapper.png" alt="Movie poster image">
                </div>
            </section>
            <section id="testimonial" class="row">
                <div class="col">
                    <h2>What others got to say about us!</h2>
                    <h4>John Doe</h4>
                    <p>Great website to use for your betting needs!</p>
                </div>
                <div class="col">
                    <img src="./images/user_profile.png" alt="user's image">
                </div>
            </section>
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