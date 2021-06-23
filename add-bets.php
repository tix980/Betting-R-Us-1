<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/members.css"
    <title>Place A Bet</title>
</head>
<body>
<div class="container-fluid">
    <?php
    require 'header.php';
    ?>
<div  class="membercontainer">
    <h1>Place A Bet</h1>
    <!--    Form to place a bet -->
    <form action="" method="post">

        <div class="formgroup">
            <label class="label" for="movie">Movie :</label>
            <input type="text" name="movie" id="movie" value="" class="formcontrol"
                   placeholder="Enter movie name">
            <span style="color: red">
            </span>
        </div>
        <div class="formgroup">
            <label class="label" for="location">Location :</label>
            <input type="text" name="location" id="location" value="" class="formcontrol"
                   placeholder="Enter your location">
            <span style="color: red">
            </span>
        </div>
        <div class="formgroup">
            <label class="label" for="email">Email :</label>
            <input type="email"  id="email" name="email" class="formcontrol"
                   value="" placeholder="Enter email">
            <span style="color: red">

            </span>
        </div>
        <div class="formgroup">
            <label class="label" for="username">UserName :</label>
            <input type="text"  id="username" name="username" class="formcontrol"
                   value="" placeholder="Enter username">
            <span style="color: red">

            </span>
        </div>
        <div class="formgroup">
            <fieldset class="fieldset">
                <legend>User Type</legend>
                <label class="label" for="radio">User Type</label>
                <input type="radio" id="member" name="usertype" value="member">
                <label for="member">Member</label>
                <input type="radio" id="regular_user" name="usertype" value="Regular user">
                <label for="regular_user">Regular user</label>
            </fieldset>
        </div>
        <div class="formgroup">
            <fieldset class="fieldset">
                <legend>Bet Amounts</legend>
                <label class="label" for="amount">Choose an amount(in Tokens)</label>
                <select id="amount" name="amount">
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                    <option value="400">400</option>
                    <option value="500">500</option>
                    <option value="600">600</option>
                    <option value="700">700</option>
                    <option value="800">800</option>
                    <option value="900">900</option>
                    <option value="1000">1000</option>
                </select>
            </fieldset>
        </div>

        <a href="userprofile.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="placebet"
                id="btn-submit" class="btn btn-primary float-right">
            Place A Bet
        </button>
    </form>
</div>
    <?php
    require 'footer.php';
    ?>
</div><!-- container -->

<script src="js/jquery.min.js"></script>
<!--<script src="js/popper.min.js"></script>-->
<script src="js/bootstrap.min.js"></script>
</body>
</html>


