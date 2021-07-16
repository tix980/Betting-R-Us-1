<?php
use BettingRUs\Models\Database;

require_once "Models/Database.php";
require_once "vendor/autoload.php";
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

    <title>Update Members</title>
</head>
<body>
<div class="container-fluid">
<div class="membercontainer">
<div class="member-form">
    <h1 class="text-center">Update Members</h1>
    <!--    Form to Add  member -->
    <form action="" method="post" >

        <div class="formgroup">
            <label class="label" for="name">Name :</label>
            <input type="text" name="name" id="name" value="" class="formcontrol"
            <span style="color: red">
            </span>
        </div>
        <div class="formgroup">
            <label class="label" for="age">Age :</label>
            <input type="text" name="age" id="age" value="" class="formcontrol"
            <span style="color: red">
            </span>
        </div>
        <div class="formgroup">
            <label class="label" for="email">Email :</label>
            <input type="email"  id="email" name="email"
                   value="" class="formcontrol"
            <span style="color: red">

            </span>
        </div>
        <div class="formgroup">
            <label class="label" for="username">UserName :</label>
            <input type="text"  id="username" name="username"
                   value="" class="formcontrol">
            <span style="color: red">

            </span>
        </div>
        <div class="formgroup">
            <label class="label" for="password">Password :</label>
            <input type="password"  id="password" name="password"
                   value="" class="formcontrol">
            <span style="color: red">

            </span>
        </div>
        <div class="formgroup">
            <label class="label" for="address">Address :</label>
            <textarea name="address" value=""
                      id="address" class="formcontrol"></textarea>
            <span style="color: red">

            </span>
        </div>
        <a href="list_members.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="updateMember"
                id="btn-submit" class="btn btn-primary float-right">
            Update Member
        </button>
    </form>
</div>
</div>
</body>
</html>


