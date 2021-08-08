<?php
    session_start();

    use BettingRUs\Models\{Database, User};
    require_once "vendor/autoload.php";

    $password=$username=$userType=$userID="";

    if(isset($_POST['loginBtn'])){
        $localUsername = $_POST['username'];
        $LocalPassword = $_POST['password'];

        $db = Database::getDb();
        $u = new User();
        $users = $u->getAllUsers($db);

        foreach($users as $user){
            $userID = $user->id;
            $username = $user->username;
            $userFullName = $user->firstname . ' ' . $user->lastname;
            $useremail = $user->email;
            $password = $user->user_password;
            $userType = $user->accountType;
            $userdob = $user->date_of_birth;
            $accountage = $user->user_since;
            echo $username;

            if($localUsername == $username && $LocalPassword == $password){
                $_SESSION['userid'] = (string)$userID;
                $_SESSION['username'] = (string)$username;
                $_SESSION['accounttype'] = (string)$userType;
                $_SESSION['userrealname'] = $userFullName;
                $_SESSION['useremail'] = $useremail;
                $_SESSION['userdob'] = $userdob;
                $_SESSION['accountage'] = $accountage;

                header('Location: index.php');
                // echo $_SESSION['userid'];
            } else {
                echo "Invalid credentials";
            }

        }
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
        <link  rel="stylesheet" type="text/css" href="css/main.css">
        <title>Log In</title>
    </head>
    <body>
        <?php include 'Views/header.php' ?>
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
                    <button class="profileBtn" name="loginBtn" type="submit">Login</button>
                </form>
            </div>
        </main>
        <?php include 'Views/footer.php' ?>
    </body>
</html>