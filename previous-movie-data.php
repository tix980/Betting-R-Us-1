<?php
use BettingRUs\Models\{Database, MovieInfo};

require_once "Models/Database.php";
require_once "vendor/autoload.php";
require_once "Models/MovieInfo.php";



$m = new MovieInfo();
$db = Database::getDb();
if(isset($_GET['id'])){
    $id=$_GET['id'];

    $m = new MovieInfo();
    $selectMovie = $m->previousMovieInfoFunction($db,$id);

//	var_dump($selectMovie);

    $actorFname = $selectMovie->actorFname;
    $actorLname = $selectMovie->actorLname;
    $title = $selectMovie->movieTitle;
    $releaseDate = $selectMovie->releaseDate;
    $summary = $selectMovie->movieSummary;
    $budget = $selectMovie->budget;
    $gross = $selectMovie->gross;
    $rating = $selectMovie->rating;
    $movieBackGround = $selectMovie->movieBackGround;
    $actors = $m->selectActorByMovieId($db, $id);

}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta content="width=device-width, initial-scale=1" name="viewport" />
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="css/previous-movie-data.css" type="text/css">
      <link rel="stylesheet" type="text/css" href="css/main.css">
  </head>
  <body>
		<header><?php require_once "Views/header.php"; ?></header>
    <main>

        <div class="page-container">
            <div class="back-btn-container">
                <a href="movie-info.php?id=<?=$id; ?>" class="btn-danger">Back to movie info</a>
            </div>
            <h1><?= $title . '(' . date("Y", $releaseDate) . ')' ?></h1>
            <div class="flex-container">
                <div class="movie-img-container">
                    <img src="<?=  $movieBackGround; ?>" style="width: 500px">
                </div>
                <div class="movie-info-container">
                    <p>Release Date: <?php
                        if ($releaseDate > date("Y/m/d")) {
                            echo $releaseDate . '</p>';
                            echo "This movie has not been released yet!" . '<a class="link-styling" href="./current-bet.php" > Place a bet today! </a>';

                        } else {
                            echo $releaseDate;
                        } ?>
                    <p><?php echo $summary ?></p>
                </div>
            </div>
            <h2>Box Office Info</h2>
                <table class="table table-bordered tb1">
                    <thead>
                    <tr>
                        <th scope="col">Movie Budget</th>
                        <th scope="col">Box Office Gross</th>
                        <th scope="col">Rating</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                           <td><?= $budget ?></td>
                            <td><?php  if ($releaseDate > date("Y/m/d")){
                                echo 'Coming Soon';
                                    } else {
                                echo $gross;
                                } ?>
                            </td>
                            <td><?php  if ($releaseDate > date("Y/m/d")){
                                    echo 'Coming Soon';
                                } else {
                                    echo $rating;
                                } ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <h2>Notable Actors</h2>
            <?php foreach($actors as $actor){?>
                <div class="actors-container">
                    <div class="actors-name"><?php echo $actor-> actor_fname . ' ' . $actor->actor_lname ?></div>

                </div>
            <?php }; ?>

            <?php if ($releaseDate > date("Y/m/d")){
                echo '<div class="btn-container"><a class="btn-primary" href="current-bet.php">' . 'Place a bet Today!' . '</a></div>';
            }
            ?>



        </div>

    </main>
		<footer><?php require_once "Views/footer.php"; ?></footer>
  </body>
</html>