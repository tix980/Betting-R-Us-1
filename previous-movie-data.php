<?php
use BettingRUs\Models\Database;

require_once "Models/Database.php";
require_once "vendor/autoload.php";
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
          <h1>Movie History Channel</h1>
          <h2>The key to the wealth and happniess</h2>
        </div>
        <a href="#" id="back-btn">Go back!</a>
        <div class="flex-container">
          <!--Img Link : https://unsplash.com/photos/kuEJKRto2NE-->
          <img src='images/Harry-potter.png' class="movie-pic" alt="harry potter poster">
          <div id="movie-detail">
            <h2>Harry Potter(2001)</h2>
            <p>This is the tale of Harry Potter (Daniel Radcliffe), an ordinary eleven-year-old boy serving
              as a sort of slave for his aunt and uncle who learns that he is actually a wizard and has been invited to attend
              the Hogwarts School for Witchcraft and Wizardry. Harry is snatched away from his mundane existence by Rubeus Hagrid
              (Robbie Coltrane), the groundskeeper for Hogwarts, and quickly thrown into a world completely foreign to both him
              and the viewer. Famous for an incident that happened at his birth, Harry makes friends easily at his new school. He 
              soon finds, however, that the wizarding world is far more dangerous for him than he would have imagined, and he quickly
               learns that not all wizards are ones to be trusted.</p>
          </div>
        </div>
        <div id="movie-box-office">
          <h2>All Releases</h2>
          <table class=".table .table-striped">
            <tbody>
              <tr>
                <th colspan="6" rowspan="6" scope="rowgroup">All releases
                DOMESTIC(31.6%)<br />
                <p>$318,087,620</p>
                INTERNATIONAL(68.4%)<br />
                <p>$688,880,550</p>
                WORLDWIDE<br />
                <p>$1,006,968,171</p>
                <th>Domestic Opening</th>
                <td>$90,294,621</td>
              </tr>
              <tr>
                <th>Budget</th>
                <td>$125,000,000</td>
              </tr>
              <tr>
                <th>Earliest Release Date</th>
                <td>November 16, 2001</td>
              </tr>
              <tr>
                <th>MPAA</th>
                <td>PG</td>
              </tr>
              <tr>
                <th>Running Time</th>
                <td>2 hr 32 min</td>
              </tr>
              <tr>
                <th>Genres</th>
                <td>Adventure Family Fantasy</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div id="actors">
          <h2>Cast and Crew</h2>
          <div class="flex-container">
            <table class=".table .table-striped">
              <thead>
                <tr>
                  <th>Crew Member</th>
                  <th>Role</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><a href="#">Chris Columbus</a></td>
                  <td>Director</td>
                </tr>
                <tr>
                  <td><a href="#">J.K. Rowling</a></td>
                  <td>Writer</td>
                </tr>
                <tr>
                  <td><a href="#">Steve Kloves</a></td>
                  <td>Writer</td>
                </tr>
                <tr>
                  <td><a href="#">David Heyman</a></td>
                  <td>Producer</td>
                </tr>
                <tr>
                  <td><a href="#">John Williams</a></td>
                  <td>Composer</td>
                </tr>
                <tr>
                  <td><a href="#">John Seale</a></td>
                  <td>Cinematographer</td>
                </tr>
                <tr>
                  <td><a href="#">Stuart Craig</a></td>
                  <td>Production Designer</td>
                </tr>
              </tbody>
            </table>
            <table>
              <thead>
                <tr>
                  <th>Actor</th>
                  <th>Character</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><a href="#">Daniel Radcliffe</a></td>
                  <td>Harry Potter</td>
                </tr>
                <tr>
                  <td><a href="#">Rupert Grint</a></td>
                  <td>Ron Weasley</td>
                </tr>
                <tr>
                  <td><a href="#">Richard Harris</a></td>
                  <td>Albus Dumbledore</td>
                </tr>
                <tr>
                  <td><a href="#">Maggie Smith</a></td>
                  <td>Professor McGonagall</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div id="all-time">
          <h2>All Time Rankings</h2>
          <table class=".table .table-striped">
            <thead>
              <tr>
                <th>All Time</th>
                <th>Rank</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Top Lifetime Grosses</td>
                <td>76</td>
              </tr>
              <tr>
                <td>Top LifeTime Grosses by MPAA Rating- PG</td>
                <td>20</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>
		<footer><?php require_once "footer.php"; ?></footer>
  </body>
</html>