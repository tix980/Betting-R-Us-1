<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/members.css">

    <title>List Members</title>
</head>
<body>
<div class="container-fluid">

<main>
    <div class="membercontainer">
        <h1>Membership Management System</h1>
        <div>
            <!--    Displaying Data in Table-->
            <table class="membertable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Athul</td>
                    <td>30</td>
                    <td>athul@gmail.com</td>
                    <td>45 sandalwood park</td>
                    <td>athul31</td>
                    <td>auerttu6ujyn</td>
                    <td><a class="memberbtn" href="update_member.php">Update</a></td>
                    <td><a class="memberbtn" href="delete_member.php">Delete</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Amal</td>
                    <td>32</td>
                    <td>amal@gmail.com</td>
                    <td>37 red clover raod</td>
                    <td>amaljose</td>
                    <td>aasdfghj</td>
                    <td><a class="memberbtn" href="update_member.php">Update</a></td>
                    <td><a class="memberbtn" href="delete_member.php">Delete</a></td>
                </tr>
                </tbody>
                <a class="addmember" href="../add_member.php">Add Member</a>
    </div>
</main>
</body>
</html>
