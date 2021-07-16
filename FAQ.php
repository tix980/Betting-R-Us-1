<?php
use BettingRUs\Models\Database;

require_once "Models/Database.php";
require_once "vendor/autoload.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/faq.css" type="text/css">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <title>FAQ</title>
</head>
<body>
<header>
    <?php require_once "header.php"; ?>
</header>

    <div class="container-md faq-page">
        <h1>FAQ</h1>

        <div class="accordion faq-section" id="accordionExample">

            <div class="faq-search-container">
                <h2>Frequently Asked Questions</h2>
                <input type="search" id="faq-search">
                <button>Search</button>
            </div>

            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="question-header btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                           Is there a age limit on making bets?
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body question-answer">
                        According to Canadian laws you must be at least 19 to make bet on our website.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class=" btn-link collapsed question-header "  type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            What kind of bets can I make?
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body question-answer">
                       You can make bets on upcoming movies on whether or not the box office will be a success or a flop.
                    </div>
                </div>
            </div>
<!--     Question 3       -->
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class=" btn-link collapsed question-header" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            What is Bets R' Us?
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body question-answer">
                        Bets R' Us is a online betting website where you can make bets on upcoming unreleased movies. You can make bets on whether or not
                        you believe that a movie will be a success or a flop based on box office earnings.
                    </div>
                </div>
            </div>
<!--   Question 4 -->
            <div class="card">
                <div class="card-header" id="headingFour">
                    <h5 class="mb-0">
                        <button class=" btn-link collapsed question-header" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                            What benefits do I get from having a membership?
                        </button>
                    </h5>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                    <div class="card-body question-answer">
                            With having a membership you are able to make unlimited bets.
                    </div>
                </div>
            </div>
<!--    Question 5        -->
            <div class="card">
                <div class="card-header" id="headingFive">
                    <h5 class="mb-0">
                        <button class="btn-link collapsed question-header" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                            How do I deposit money into my account?
                        </button>
                    </h5>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                    <div class="card-body question-answer">
                        You can deposit money into your account via credit card.
                    </div>
                </div>
            </div>

        </div>



    </div>



    <footer><?php require_once "footer.php"; ?></footer>

</body>



</html>