<?php

use BettingRUs\Models\{Database, MovieInfo};
require_once '../vendor/autoload.php';

$actorFirstName=$actorLastName=$birthDate=$birthCity=$biography=$poster ="";
$m = new MovieInfo();
$db = Database::getDb();
var_dump($_POST);
if(isset($_POST['updateActor'])){
    $id=$_POST['id'];
    $actor =$m->selectedActor($id,$db);

    $actorFirstName = $actor->actor_fname;
    $actorLastName =$actor->actor_lname;
    $birthDate = $actor->date_of_birth;
    $birthCity = $actor->birth_city;
    $biography = $actor->biography;
    $poster = $actor->poster;

}

if(isset($_POST['updActor'])){
    $id=$_POST['id'];
    $actorFirstName = $_POST['actor-first-name'];
    $actorLastName = $_POST['actor-last-name'];
    $birthDate = $_POST['actor-birth-date'];
    $birthCity = $_POST['actor-birth-city'];
    $biography = $_POST['actor-biography'];
      $poster = $_POST['actorimage'];

    $count = $m->updateActor($id,$actorFirstName, $actorLastName,$birthDate,$birthCity,$biography,$poster,$db);
    if($count){
        echo "success";
//        header("Location: ../list-actors.php");
    }else{
        echo "something is wrong!";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Add Actor</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link  rel="stylesheet" type="text/css" href="../css/contact-bet-history.css">
    <link  rel="stylesheet" type="text/css" href="../css/main.css">
    <meta name="viewport" content="width=device-width">
</head>
<body>
<div class="current-bet-page" style="margin-top: 2em">
    <h1>Update Actor</h1>
    <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id; ?>" />
        <div class="form-group">
            <label for="actor-first-name">Actor First Name:</label>
            <input type="text" class="form-control" name="actor-first-name" id="actor-first-name" placeholder="First Name" value="<?= $actorFirstName; ?>">
        </div>
        <div class="form-group">
            <label for="actor-last-name">Actor Last Name:</label>
            <input type="text" class="form-control" name="actor-last-name" id="actor-last-name" placeholder="Last Name" value="<?= $actorLastName; ?>">
        </div>
        <div class="form-group">
            <label for="actor-birth-date">Date of Birth</label>
            <input type="text" class="form-control" name="actor-birth-date" id="actor-birth-date" placeholder="YYY-MM-DD" value="<?= $birthDate; ?>">
        </div>
        <div class="form-group">
            <label for="actor-birth-city">Actor Birth City</label>
            <input type="text" class="form-control" name="actor-birth-city" id="actor-birth-city" placeholder="Enter City" value="<?= $birthCity; ?>">
        </div>
        <div class="form-group">
            <label for="actor-biography">Actor Biography:</label>
            <textarea  class="form-control" name="actor-biography" id="actor-biography" ><?= $biography; ?>"</textarea>
        </div>
        <div class="form-group">
            <input type="file" name="actorimage" id="actorimage" value="<?= $poster; ?>">
        </div>
        <div class="form-group">
            <a href="../list-actors.php" id="btn_back" class="btn btn-success">Back to Actor List</a>
        </div>
        <button type="submit" name="updActor" class="btn btn-primary" id="btn-submit">
    Update Actor
</button>
    </form>
</div>
</body>
</html>