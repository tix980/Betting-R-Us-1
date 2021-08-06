<?php
    use BettingRUs\Models\{Database, User};
    require_once "../vendor/autoload.php";

    $username = "";  
    $firstname = ""; 
    $lastname = "";  
    $email = "";  
    $password = ""; 
    $dob = ""; 

    if(isset($_POST['updateUser'])) {
        $id = $_POST['id'];
        
        $db = Database::getDb();
        $userObj = new User();

        $users = $userObj->getUserID($id, $db);

        $username = $users->username;  
        $firstname = $users->firstname; 
        $lastname = $users->lastname;  
        $email = $users->email;  
        $password = $users->user_password; 
        $dob = $users->date_of_birth; 
    }

    if(isset($_POST['upUser'])) {
        $id = $_POST['user_id'];
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['user_password'];
        $dob = $_POST['date_of_birth'];

        $db = Database::getDb();
        $userObj = new User();

        $count = $userObj->updateUser($id, $username, $firstname, $lastname, $email, $password, $dob, $db);

        if($count) {
            header('Location: list_users.php');
        } else {
            echo "<p>User was not updated!</p>";
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
        <link  rel="stylesheet" type="text/css" href="../css/main.css">
        <title>Update User</title>
    </head>
    <body>
        <main>
            <div class="forms">
                <h1>Update User</h1>
                <form action="" method="POST">
                    <input type="hidden" name="user_id" value="<?= $id; ?>" />
                    <div class="formFields">
                        <label for="username">Username:</label>
                        <input id="username" type="text" name="username" value="<?= $username; ?>" />
                    </div>
                    <div class="formFields">
                        <label for="firstname">First Name:</label>
                        <input id="firstname" type="text" name="firstname" value="<?= $firstname; ?>" />
                    </div>
                    <div class="formFields">
                        <label for="lastname">Last Name:</label>
                        <input id="lastname" type="text" name="lastname" value="<?= $lastname; ?>" />
                    </div>
                    <div class="formFields">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" name="date_of_birth" id="dob" value="<?= $dob;  ?>" />
                    </div>
                    <div class="formFields">
                        <label for="email">Email:</label>
                        <input id="email" type="email" name="email" value="<?= $email; ?>" />
                    </div>
                    <div class="formFields">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="user_password" value="<?= $password; ?>" />
                    </div>
                    <button class="profileBtn" type="submit" name="upUser">Update User</button>
                </form>
            </div>
        </main>
    </body>
</html>