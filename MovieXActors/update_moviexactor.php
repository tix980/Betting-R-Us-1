<?php
use BettingRUs\Models\{Database, MovieInfo};

require_once '../vendor/autoload.php';
require_once '../current_bets/currentBetMovieFunction.php';

require_once '../contactUs/contactFunction.php';
//var_dump($_POST);


$movie = $actor =$movieId = $actorId = $actorFirstName= $actorLastName ="";
$s = new MovieInfo();
$movies = $s->listMovies(Database::getDb());

$f = new MovieInfo();
$actors = $f->listActors(Database::getDb());
if(isset($_POST['updateActorxMovie'])){
    $id= $_POST['id'];

    $db = Database::getDb();

    $s = new MovieInfo();
    $movie = $s->getMovieWithId($id, $db);

    $a = new MovieInfo();
    $actor = $a->getActorWithId($id,$db);

    $movie = $s->title;
    $movieId= $s->id;
    $actorFirstName =  $a->actor_fname;
    $actorLastName =  $a->actor_lname;
    $actorId =  $a->id;



}
if(isset($_POST['updContactFeedback'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $contactNumber = $_POST['telephone'];
    $enquiry = $_POST['enquiry'];
    $message = $_POST['description'];
    $status = $_POST['status'];

    $db = Database::getDb();
    $s = new ContactFeedback();
    $count = $s->updateContactFeedback($id,$firstname, $lastname,$email,$contactNumber,$enquiry,$message,$status, $db);

    if($count){
        header("Location: list_contactus.php");
    } else {
        echo "problem updating the form info";
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
    <h1>Add Movies TO  Actors and Vise Versa</h1>
    <div class="back-btn-container ">
        <a href="../list-actors.php" class="btn-danger">Back to Actors List</a>
        <a href="../list-movies.php" class="btn-danger">Back to Movies List</a>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="actor"> Actor :</label>
            <select  name="actor" class="form-control"
                     id="actor" >
                <?php echo  populateDropdownActor($actors,$actorId) ?>
            </select>
            <span style="color: red">

            </span>
        </div>
        <div class="form-group">
            <label for="movie"> Movies :</label>
            <select  name="movie" class="form-control"
                     id="movie" >
                <?php echo  populateDropdownMovie($movies,$movieId) ?>
            </select>
            <span style="color: red">

            </span>
        </div>
        <button type="submit" name="addMovieActor" class="btn btn-primary" id="btn-submit">
            Add Actors to Movies
        </button>
    </form>
</div>
</body>
</html>
