<?php 
    use BettingRUs\Models\{Database, User};

    require_once "../vendor/autoload.php";

    $db = Database::getDb();
    $userObj = new User();
    $users = $userObj->getAllUsers(Database::getDb());

    if($users) {
        echo "Success!";
    } else {
        echo "Something went wrong";
    }
?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link  rel="stylesheet" type="text/css" href="../css/main.css">
        <title>List of User</title>
    </head>
    <body>
        <main>
            <h1 class="text-center">List of User</h1>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>User Since</th>
                        <th>Account Type</th>
                        <th>Membership</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $bet_user) { ?>
                        <tr>
                            <td><?= $bet_user->username ?></td>
                            <td><?= $bet_user->firstname ?></td>
                            <td><?= $bet_user->lastname ?></td>
                            <td><?= $bet_user->date_of_birth ?></td>
                            <td><?= $bet_user->email ?></td>
                            <td><?= $bet_user->user_password ?></td>
                            <td><?= $bet_user->user_since ?></td>
                            <td><?= $bet_user->account_type ?></td>
                            <td><?= $bet_user->membership ?></td>
                            <td>
                                <form action="update_user.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $bet_user->id; ?>" />
                                    <input class="button btn btn-primary" type="submit" name="updateUser" value="Update" />
                                </form>
                            </td>
                            <td>
                                <form action="delete_user.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $bet_user->id; ?>" />
                                    <input class="button btn btn-danger" type="submit" name="deleteUser" value="Delete" />
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
    </body>
</html>