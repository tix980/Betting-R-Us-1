<?php
use BettingRUs\Models\Database;

require_once "Models/Database.php";
require_once "vendor/autoload.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link href="./css/main.css" rel="stylesheet" type="text/css" />
        <title>Log In</title>
    </head>
    <body>
        <?php include 'header.php' ?>
        <main>
            <div class="forms">
                <h1>Login to Start Betting!</h1>
                <form id="loginForm" action="" method="POST">
                    <div class="formFields">
                        <label for="username">Username:</label>
                        <input id="username" type="text" name="username">
                    </div>
                    <div class="formFields">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password">
                    </div>
                    <button class="profileBtn" type="submit">Login</button>
                </form>
            </div>
        </main>
        <?php include 'footer.php' ?>
    </body>
</html>