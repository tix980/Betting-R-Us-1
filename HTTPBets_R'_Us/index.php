<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link href="./css/main.css" rel="stylesheet" type="text/css" />
        <title>Bets R' Us</title>
    </head>
    <body>
        <?php require_once "header.php"; ?>
        <main>
            <section id="hero">
                <div>
                    <img id="heroImg" src="./images/hero.jpg" alt="">
                </div>
                <div>
                    <h2>Safe Betting</h2>
                    <button class="betBtn">Join Now!</button>
                </div>
            </section>
            <section id="lastMinBets">
                <h2>Last Minute Bets</h2>
                <div>
                    <h3></h3>
                    <button class="betBtn">Bet Now!</button>
                </div>
                <div>
                    <h3></h3>
                    <button class="betBtn">Bet Now!</button>
                </div>
                <div>
                    <h3></h3>
                    <button class="betBtn">Bet Now!</button>
                </div>
                <div>
                    <h3></h3>
                    <button class="betBtn">Bet Now!</button>
                </div>
            </section>
            <section id="leaderBoard">
                <div>
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
                <div>
                    <h2>Leadership Board</h2>
                    <p></p>
                </div>
            </section>
            <section id="featuredMovies">
                <h2>Featured Movies</h2>
                <p>filler text</p>
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
            <section id="testimonial">
                <div>
                    <h2>What others got to say about us!</h2>
                    <h4>John Doe</h4>
                    <p>Great website to use for your betting needs!</p>
                </div>
                <div>
                    <img src="./images/user_profile.png" alt="user's image">
                </div>
            </section>
            <section id="membership">
                <h2>What are you waiting for!</h2>
                <button class="betBtn">Membership</button>
                <button class="betBtn">FAQ</button>
            </section>
        </main>
        <?php require_once "footer.php"; ?>
    </body>
</html>