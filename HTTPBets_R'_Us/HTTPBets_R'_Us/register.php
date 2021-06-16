<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link href="./css/main.css" rel="stylesheet" type="text/css" />
        <title>Register</title>
    </head>
    <body>
        <?php require_once 'header.php' ?>
        <main>
            <div class="forms">
                <h1>Sign Up for a free Account!</h1>
                <form id="registerForm" action="" method="POST">
                    <div class="formFields">
                        <label for="username">Username:</label>
                        <input id="username" type="text" name="username" />
                    </div>
                    <div class="formFields">
                        <label for="email">Email:</label>
                        <input id="email" type="email" name="email" />
                    </div>
                    <div class="formFields">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" />
                    </div>
                    <button class="profileBtn" type="submit">Register</button>
                </form>
            </div>
        </main>
        <?php require_once 'footer.php' ?>
    </body>
</html>