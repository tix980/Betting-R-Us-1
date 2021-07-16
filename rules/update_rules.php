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
    <title>Add Member</title>
</head>
<body>
<div class="container-fluid">

    <div class="membercontainer">
        <h1>Update Rule</h1>
<form action="../rules.php" method="post">
<div class="formgroup">
    <label class="label" for="program">Rule:</label>
    <input type="text" name="program" value=" " class="formcontrol"
           id="program" placeholder="Enter Rule">
    <span style="color: red">

            </span>
</div>
<a href="../rules.php" id="btn_back" class="btn btn-success float-left">Back</a>
<button type="submit" name="updaterule"
        class="btn btn-primary float-right" id="btn-submit">
    Update Rule
</button>
</form>