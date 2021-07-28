<?php
use BettingRUs\Models\{Database, MovieInfo};


require_once "vendor/autoload.php";
require_once "Models/Database.php";
require_once "Models/MovieInfo.php";

$actorFname=$actorLname=$title=$poster=$birthCity=$birthDate=$biography="";
$m = new MovieInfo();
$db = Database::getDb();
if(isset($_GET['id'])) {
	$id = $_GET['id'];

	$m = new MovieInfo();
	$selectActor = $m->selectMovieByActorId($db, $id);

	var_dump($selectActor);

	$actorFname = $selectActor[0]->actorFname;
	$actorLname = $selectActor[0]->actorLname;
	$title = $selectActor[0]->movieTitle;
	$poster = $selectActor[0]->poster;
	$birthCity = $selectActor[0]->birthcity;
	$birthDate = $selectActor[0]->birthdate;
	$biography = $selectActor[0]->biography;

	$movies = $m->actorInfoFunction($db, $id);
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>movie info</title>
		<link href="css/main.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/previous-movie-data.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
		<header><?php require_once "header.php"; ?></header>
    <main>
      <div class="page-container">
        <div id="page-title">
          <h1>Actor info page</h1>
          <h2><?php echo $actorFname . ' ' . $actorLname; ?> </h2>
        </div>
        <a href="list-actors.php" id="back-btn">Go back!</a>
        <div class="flex-container">
          <!--Img Link : https://unsplash.com/photos/kuEJKRto2NE-->
          <img src="<?php echo $poster; ?> " class="movie-pic" alt="actor poster">
          <div id="movie-detail">
            <h2> <?php echo $title; ?>  </h2>
						<p>City of birth: <?php echo $birthCity; ?> </p>
						<p>date of birth: <?php echo $birthDate; ?></p>
						<p>Biography:</p>
						<p><?php echo $biography; ?></p>
          </div>
        </div>
				<div>
					<h2>Movies</h2>
					<?php foreach ($movies as $movie){?>
					<div class="movie-name">
						<div class="movie-poster"><a href="#"><img src="<?php echo $movie-> poster ?>" alt="actor picture" height="150"  width="100" /></a></div>
						<div class="movie-title"><a href="movie-info.php?id=<?php echo $movie->id ?>"><?php echo $movie-> movieTitle ?></a></div>
					</div>
					<?php }; ?>
				</div>
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
    </main>
		<footer><?php require_once "footer.php"; ?></footer>
  </body>
</html>