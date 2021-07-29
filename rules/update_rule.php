<?php
use BettingRUs\Models\{Database, Rule};

require_once "../Models/Database.php";
require_once "../vendor/autoload.php";
$rule = "";
if(isset($_POST['updateRule'])){

    $id = $_POST['id'];
    $db = Database::getDb();

    $r = new Rule();
    $getrule = $r->getRuleWithId($id, $db);

    $rule = $getrule->rule;
}

if(isset($_POST['updRule'])){
    $rule = $_POST['rule'];
    $id = $_POST['id'];

    $db = Database::getDb();

    $r = new Rule();
    $rule = $r->updateRule($id, $rule, $db);

    if($rule){
        header("Location: list_rules.php");
    } else {
        echo "problem updating a rule";
    }
}

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
<form action="" method="post">
    <input type="hidden" name="id" value="<?= $id ?>">
<div class="formgroup">
    <label class="label" for="rule">Rule:</label>
    <input type="text" name="rule" value="<?= $rule ?> " class="formcontrol"
           id="rule" placeholder="Enter Rule">
    <span style="color: red">

            </span>
</div>
<a href="list_rules.php" id="btn_back" class="btn btn-success float-left">Back</a>
<button type="submit" name="updRule"
        class="btn btn-primary float-right" id="btn-submit">
    Update Rule
</button>
</form>