<?php
use BettingRUs\Models\{Database, MovieInfo};

require_once "../Models/Database.php";
require_once '../vendor/autoload.php';


//$b = new MovieInfo();
//$movies = $b->getMovie(Database::getDb());
var_dump($_POST);
if(isset($_POST['addDirector'])) {
    $file = $_FILES['directorimage'];

    $fileName = $_FILES['directorimage']['name'];
    print_r($fileName);
    $fileNameTmpName = $_FILES['directorimage']['tmp_name'];
    $fileNameSize = $_FILES['directorimage']['size'];
    $fileNameError = $_FILES['directorimage']['error'];
    $fileNameType = $_FILES['directorimage']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');
    if(in_array($fileActualExt, $allowed)){
        if($fileNameError === 0) {
            if ($fileNameSize < 1000000) {
                $t=time();

                $fileDestination = '../images/directors/'  . $t . $fileName;
                move_uploaded_file($fileNameTmpName, $fileDestination);
                $directorFirstName = $_POST['director-first-name'];
                $directorLastName = $_POST['director-last-name'];
                $birthDate = $_POST['director-birth-date'];
                $birthCity = $_POST['director-birth-city'];
                $biography = $_POST['director-biography'];
                $poster = $t . $fileName;

                $db = Database::getDb();
                $s = new MovieInfo();
                $c = $s->addDirector($directorFirstName, $directorLastName, $birthDate, $birthCity, $biography, $poster, $db);


                if ($c) {
                    header("Location: ../list_directors.php");
                } else {
                    echo "problem adding a New Director";
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
    <h1>Add New Director</h1>
    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">

        </div>
        <div class="form-group">
            <label for="director-first-name">Director First Name:</label>
            <input type="text" class="form-control" name="director-first-name" id="director-first-name" placeholder="First Name">
        </div>
        <div class="form-group">
            <label for="director-last-name">Director Last Name:</label>
            <input type="text" class="form-control" name="director-last-name" id="director-last-name" placeholder="Last Name">
        </div>
        <div class="form-group">
            <label for="director-birth-date">Date of Birth</label>
            <input type="text" class="form-control" name="director-birth-date" id="director-birth-date" placeholder="YYY-MM-DD">
        </div>
        <div class="form-group">
            <label for="director-birth-city"> Birth City</label>
            <input type="text" class="form-control" name="director-birth-city" id="director-birth-city" placeholder="Enter City">
        </div>
        <div class="form-group">
            <label for="director-biography"> Biography:</label>
            <textarea  class="form-control" name="director-biography" id="director-biography" ></textarea>
        </div>

        <div class="form-group">

            <input type="file" name="directorimage" id="directorimage">
        </div>
        <div class="form-group">
            <a href="../list-directors.php" id="btn_back" class="btn btn-success">Back to Director List</a>
        </div>
        <button type="submit" name="addDirector" class="btn btn-primary" id="btn-submit">
            Add Director
        </button>

    </form>
</div>
</body>
</html>

