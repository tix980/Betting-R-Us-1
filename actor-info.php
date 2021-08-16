<?php
session_start();
use BettingRUs\Models\{Database, MovieInfo};


require_once "vendor/autoload.php";
//require_once "Models/Database.php";
//require_once "Models/MovieInfo.php";
(string)$userType = $_SESSION['accounttype'];
if($userType == 'admin') {
    $adminBtn = "style='display:block;'";

} else {
    $adminBtn = "style='display:none;'";
}
$actorFname =$actorLname= $title= $poster= $birthCity= $birthDate= $biography="";
$m = new MovieInfo();
$db = Database::getDb();

if(isset($_GET['id'])) {
	$id = $_GET['id'];

	$m = new MovieInfo();
	$selectActor = $m->getActorWithId($id,$db);

//	var_dump($selectActor);

	$actorFname = $selectActor->actor_fname;
	$actorLname = $selectActor->actor_lname;
	$dateOfBirth = $selectActor->date_of_birth;
	$birthCity = $selectActor->birth_city;
	$biography = $selectActor->biography;
    $poster = $selectActor->poster;


    $e = new MovieInfo();
	$movies = $e->selectActorMoviesByActorId($db, $id);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/previous-movie-data.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Previous Movie Data</title>
</head>
<body>
<header><?php require_once "Views/header.php"; ?></header>
<main>
    <div <?php echo $adminBtn?>>
    <form action="MovieActors/update_actor.php" method="post">
        <input type="hidden" name="id" value="<?= $id ?>"/>
        <input type="submit" class="button btn btn-primary" name="updateActor" value="Update"/>
    </form>
    <form action="MovieActors/delete_actor.php" method="post">
        <input type="hidden" name="id" value="<?= $id ?>"/>
        <input type="submit" class="button btn btn-danger" name="deleteActor" value="Delete"/>
    </form>
    </div>
    <div class="page-container">
        <div class="back-btn-container ">
            <a href="list-actors.php" class="btn-danger">Back to Actors List</a>
            <a href="list-movies.php" class="btn-danger">Back to Movies List</a>
        </div>

        <h1><?= $actorFname ." " . $actorLname ?>  </h1>
        <div class="flex-container">
            <div class="movie-img-container movie-actor-img">
                <img src="images/actors/<?=  $poster ?>" style="width: 500px">
            </div>
            <div class="movie-info-container">
                <h3>Birth Date</h3>
                <p><?=  $dateOfBirth ?></p>
                <h3>Birth City</h3>
                <p><?=  $birthCity ?></p>
                <h3>Biography</h3>
                <p><?=  $biography ?></p>
                <h3>Movies Featured</h3>
                <ul>
                <?php foreach($movies as $movie){?>
<!--                    <div class="actors-container">-->

                        <li class="actors-name"><?php echo $movie->title ?></li>

<!--                    </div>-->
                <?php }; ?>
                </ul>
            </div>
        </div>

    </div>

</main>
<footer><?php require_once "Views/footer.php"; ?></footer>
</body>
</html>
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--  <head>-->
<!--    <meta charset="utf-8">-->
<!--    <title>movie info</title>-->
<!--		<link href="css/main.css" rel="stylesheet" type="text/css" />-->
<!--    <link rel="stylesheet" type="text/css" href="css/previous-movie-data.css">-->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
<!--  </head>-->
<!--  <body>-->
<!--		<header>--><?php //require_once "Views/header.php"; ?><!--</header>-->
<!--    <main>-->
<!--      <div class="page-container">-->
<!--        <div id="page-title">-->
<!--          <h1>Actor info page</h1>-->
<!--          <h2>--><?php //echo $actorFname . ' ' . $actorLname; ?><!-- </h2>-->
<!--        </div>-->
<!--        <a href="list-actors.php" id="back-btn">Go back!</a>-->
<!--        <div class="flex-container">-->
<!--          <!--Img Link : https://unsplash.com/photos/kuEJKRto2NE-->-->
<!--          <img src="--><?php //echo $poster; ?><!-- " class="movie-pic" alt="actor poster">-->
<!--          <div id="movie-detail">-->
<!--            <h2> --><?php //echo $title; ?><!--  </h2>-->
<!--						<p>City of birth: --><?php //echo $birthCity; ?><!-- </p>-->
<!--						<p>date of birth: --><?php //echo $birthDate; ?><!--</p>-->
<!--						<p>Biography:</p>-->
<!--						<p>--><?php //echo $biography; ?><!--</p>-->
<!--          </div>-->
<!--        </div>-->
<!--				<div>-->
<!--					<h2>Movies</h2>-->
<!--					--><?php //foreach ($movies as $movie){?>
<!--					<div class="movie-name">-->
<!--						<div class="movie-poster"><a href="#"><img src="--><?php //echo $movie-> poster ?><!--" alt="actor picture" height="150"  width="100" /></a></div>-->
<!--						<div class="movie-title"><a href="movie-info.php?id=--><?php //echo $movie->id ?><!--">--><?php //echo $movie-> movieTitle ?><!--</a></div>-->
<!--					</div>-->
<!--					--><?php //}; ?>
<!--				</div>-->
<!--        <div id="movie-box-office">-->
<!--          <h2>All Releases</h2>-->
<!--          <table class=".table .table-striped">-->
<!--            <tbody>-->
<!--              <tr>-->
<!--                <th colspan="6" rowspan="6" scope="rowgroup">All releases-->
<!--                DOMESTIC(31.6%)<br />-->
<!--                <p>$318,087,620</p>-->
<!--                INTERNATIONAL(68.4%)<br />-->
<!--                <p>$688,880,550</p>-->
<!--                WORLDWIDE<br />-->
<!--                <p>$1,006,968,171</p>-->
<!--                <th>Domestic Opening</th>-->
<!--                <td>$90,294,621</td>-->
<!--              </tr>-->
<!--              <tr>-->
<!--                <th>Budget</th>-->
<!--                <td>$125,000,000</td>-->
<!--              </tr>-->
<!--              <tr>-->
<!--                <th>Earliest Release Date</th>-->
<!--                <td>November 16, 2001</td>-->
<!--              </tr>-->
<!--              <tr>-->
<!--                <th>MPAA</th>-->
<!--                <td>PG</td>-->
<!--              </tr>-->
<!--              <tr>-->
<!--                <th>Running Time</th>-->
<!--                <td>2 hr 32 min</td>-->
<!--              </tr>-->
<!--              <tr>-->
<!--                <th>Genres</th>-->
<!--                <td>Adventure Family Fantasy</td>-->
<!--              </tr>-->
<!--            </tbody>-->
<!--          </table>-->
<!--        </div>-->
<!--        <div id="actors">-->
<!--          <h2>Cast and Crew</h2>-->
<!--          <div class="flex-container">-->
<!--            <table class=".table .table-striped">-->
<!--              <thead>-->
<!--                <tr>-->
<!--                  <th>Crew Member</th>-->
<!--                  <th>Role</th>-->
<!--                </tr>-->
<!--              </thead>-->
<!--              <tbody>-->
<!--                <tr>-->
<!--                  <td><a href="#">Chris Columbus</a></td>-->
<!--                  <td>Director</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                  <td><a href="#">J.K. Rowling</a></td>-->
<!--                  <td>Writer</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                  <td><a href="#">Steve Kloves</a></td>-->
<!--                  <td>Writer</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                  <td><a href="#">David Heyman</a></td>-->
<!--                  <td>Producer</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                  <td><a href="#">John Williams</a></td>-->
<!--                  <td>Composer</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                  <td><a href="#">John Seale</a></td>-->
<!--                  <td>Cinematographer</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                  <td><a href="#">Stuart Craig</a></td>-->
<!--                  <td>Production Designer</td>-->
<!--                </tr>-->
<!--              </tbody>-->
<!--            </table>-->
<!--            <table>-->
<!--              <thead>-->
<!--                <tr>-->
<!--                  <th>Actor</th>-->
<!--                  <th>Character</th>-->
<!--                </tr>-->
<!--              </thead>-->
<!--              <tbody>-->
<!--                <tr>-->
<!--                  <td><a href="#">Daniel Radcliffe</a></td>-->
<!--                  <td>Harry Potter</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                  <td><a href="#">Rupert Grint</a></td>-->
<!--                  <td>Ron Weasley</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                  <td><a href="#">Richard Harris</a></td>-->
<!--                  <td>Albus Dumbledore</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                  <td><a href="#">Maggie Smith</a></td>-->
<!--                  <td>Professor McGonagall</td>-->
<!--                </tr>-->
<!--              </tbody>-->
<!--            </table>-->
<!--          </div>-->
<!--        </div>-->
<!--        <div id="all-time">-->
<!--          <h2>All Time Rankings</h2>-->
<!--          <table class=".table .table-striped">-->
<!--            <thead>-->
<!--              <tr>-->
<!--                <th>All Time</th>-->
<!--                <th>Rank</th>-->
<!--              </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--              <tr>-->
<!--                <td>Top Lifetime Grosses</td>-->
<!--                <td>76</td>-->
<!--              </tr>-->
<!--              <tr>-->
<!--                <td>Top LifeTime Grosses by MPAA Rating- PG</td>-->
<!--                <td>20</td>-->
<!--              </tr>-->
<!--            </tbody>-->
<!--          </table>-->
<!--        </div>-->
<!--      </div>-->
<!--    </main>-->
<!--		<footer>--><?php //require_once "Views/footer.php"; ?><!--</footer>-->
<!--  </body>-->
<!--</html>-->
