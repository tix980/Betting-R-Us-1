<?php
use BettingRUs\Models\{Database, MovieInfo};

require_once "../Models/Database.php";
require_once '../vendor/autoload.php';


//$b = new MovieInfo();
//$movies = $b->getMovie(Database::getDb());
var_dump($_POST);
if(isset($_POST['addActor'])) {
    $file = $_FILES['actorimage'];

    $fileName = $_FILES['actorimage']['name'];
    print_r($fileName);
    $fileNameTmpName = $_FILES['actorimage']['tmp_name'];
    $fileNameSize = $_FILES['actorimage']['size'];
    $fileNameError = $_FILES['actorimage']['error'];
    $fileNameType = $_FILES['actorimage']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');
    if(in_array($fileActualExt, $allowed)){
        if($fileNameError === 0) {
            if ($fileNameSize < 1000000) {

                $fileDestination = '../images/actors/' . $fileName;
                move_uploaded_file($fileNameTmpName, $fileDestination);
                $actorFirstName = $_POST['actor-first-name'];
                $actorLastName = $_POST['actor-last-name'];
                $birthDate = $_POST['actor-birth-date'];
                $birthCity = $_POST['actor-birth-city'];
                $biography = $_POST['actor-biography'];
                    $actorImageUpload = $fileName;

                $db = Database::getDb();
                $s = new MovieInfo();
                $c = $s->addActor($actorFirstName, $actorLastName, $birthDate, $birthCity, $biography, $actorImageUpload, $db);


                if ($c) {
                    header("Location: ../list-actors.php");
                } else {
                    echo "problem adding a New Actor";
                }
            }else {
                echo "Your file is too big";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type";
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
    <h1>Add New Actor</h1>
    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">

        </div>
        <div class="form-group">
            <label for="actor-first-name">Actor First Name:</label>
            <input type="text" class="form-control" name="actor-first-name" id="actor-first-name" placeholder="First Name">
        </div>
        <div class="form-group">
            <label for="actor-last-name">Actor Last Name:</label>
            <input type="text" class="form-control" name="actor-last-name" id="actor-last-name" placeholder="Last Name">
        </div>
        <div class="form-group">
            <label for="actor-birth-date">Date of Birth</label>
            <input type="text" class="form-control" name="actor-birth-date" id="actor-birth-date" placeholder="YYY-MM-DD">
        </div>
        <div class="form-group">
            <label for="actor-birth-city">Actor Birth City</label>
            <input type="text" class="form-control" name="actor-birth-city" id="actor-birth-city" placeholder="Enter City">
        </div>
        <div class="form-group">
            <label for="actor-biography">Actor Biography:</label>
            <textarea  class="form-control" name="actor-biography" id="actor-biography" ></textarea>
        </div>
<!--        <div class="form-group">-->
<!--            <label for="actor-image"> Actor Image</label>-->
<!--            <input type="text" class="form-control" name="actor-image" id="actor-image" placeholder="Paste your url path here">-->
<!--        </div>-->
        <div class="form-group">
<!--            <label for="actorimage"> Actor Image</label>-->
            <input type="file" name="actorimage" id="actorimage">
        </div>
        <div class="form-group">
            <a href="../list-actors.php" id="btn_back" class="btn btn-success">Back to Actor List</a>
        </div>
        <button type="submit" name="addActor" class="btn btn-primary" id="btn-submit">
            Add Actor
        </button>

    </form>
</div>
</body>
</html>

