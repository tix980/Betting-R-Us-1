<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>movie info</title>
		<link href="css/main.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/movie-info.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
	<header>
		<?php require_once "header.php"; ?>
	</header>
    <main>
      <div class="page-container">
 				<div id="buttons">
					<a href="#" class="btn btn-danger float-left">Go back</a>
					<a href="#" class="btn btn-primary">Box Office</a>
				</div>
        <h1 id="movie-title">STAR WARS IV:
					A NEW HOPE</h1>
				<div id="release-date">
					<h3>Release Date</h3>
					<p>1977-05-25</p>
				</div>
				<div class="flex-container">
					<div class="actor-name">
						<div class="first-name"><a href="#">Mark</a></div>
						<div class="last-name"><a href="#">Hamill</a></div>
					</div>
					<div class="actor-name">
						<div class="first-name"><a href="#">Harrison</a></div>
						<div class="last-name"><a href="#">Ford</a></div>
					</div>
					<div class="actor-name">
						<div class="first-name"><a href="#">Carrie</a></div>
						<div class="last-name"><a href="#">Fisher</a></div>
					</div>
					<div class="director-name">
						<div class="first-name"><a href="#">George</a></div>
						<div class="last-name"><a href="#">Lucas</a></div>
					</div>
					<a href="#" id="bet-btn">PLACE THE BET NOW!</a>
				</div>
      </div>
    </main>
		<footer><?php require_once "footer.php"; ?></footer>
  </body>
</html>