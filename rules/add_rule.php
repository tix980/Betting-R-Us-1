<?php
use BettingRUs\Models\{Database, Rule};

require_once "../Models/Database.php";
require_once "../vendor/autoload.php";

if(isset($_POST['addRule'])){
    $rule = $_POST['rule'];

    $db = Database::getDb();
    $r= new Rule();
    $rules = $r->addRule($rule, $db);

    if ($rules) {
        header("Location: list_rules.php");
    } else {
        echo "Problem adding new rule";
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
    <h1>Add Rule</h1>
<form action="" method = "post">
    <div class="formgroup">
        <label class="label" for="rules">Rule :</label>
        <input type="text" name="rule"
                  id="rule" placeholder="Enter a rule" class="formcontrol"/>
        <span style="color: red"></span>
    </div>
    <a href="list_rules.php" id="btn_back" class="btn btn-success float-left">Back</a>
    <button type="submit" name="addRule"
            class="btn btn-primary float-right" id="btn-submit">
        Add Rule
    </button>
</form>
</div>

