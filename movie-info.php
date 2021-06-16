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
        <div id="page-title">
          <h1>Movie information Channel</h1>
          <h2>The key to the wealth and happniess</h2>
        </div>
        <h1 id="movie-title">Movie name : Harry Potter</h1>
        <div class="flex-container">
          <!--Img Link : https://unsplash.com/photos/kuEJKRto2NE-->
          <img src='images/Harry-potter.png' class="movie-pic" alt="harry potter poster">
          <div id="reviews">
            <h2>Top verified Critic Review</h2>
            <p>HOLY SMOKE! BEST MOVIE OF THE CENTURY!</p>
            <p>One of the best but concentrational films between the books published later in 1997.
             A childhood film of mine but it's brilliant.</p>
            <p>With a considerable length of time, the film manages to develop many characters very well,
             as well as being fun.</p>
            <p>I love Harry Potter since I was a little child, and this movie started it all. Not the best in the saga,
             but an amazing introduction to the wizarding world.</p>
             <p>Separated by 20 years from first seeing this in the cinema, and by more years from over-familiarity with
                the book, this is much more fun than I remember it being at the time. It has all the joy, magic and wonder
                it needs, and the plot no longer feels like it's on rails in a slavish fidelity to the book. It doesn't need
                to be this long, but it works well ... not least due to the near-faultless casting which, as well as ensuring
                the film meets its mark sets the whole series up for success.</p>
              <p>
                Wow. Just wow. This movie absolutely blew me away. I didn't have too many expectations for this movie,
                but when I watched it, I just was captivated at how accurate it was to the book, yet felt like its own
                thing at the same time. An absolute must see.</p>
            </div>
          </div>
        <div id="movie-info">
          <h2>Movie Info</h2>
          <div>Director:<a href="#">Chris Columbus</a></div>
          <div>Actors:<a href="#">Daniel Radcliffe</a>,<a href="#">Rupert Grint</a>,
            <a href="#">Richard Harris</a>,<a href="#">Maggie Smith</a>,
            <a href="#">Emma Watson</a></div>
          <div>Genre :Aventure</div>
          <div>Release Date: 2001-11-16</div>
        </div>
        <div id="movie-detail">
          <h2>Brief Movie Story:</h2>
          <p>his is the tale of Harry Potter (Daniel Radcliffe), an ordinary eleven-year-old boy serving
          as a sort of slave for his aunt and uncle who learns that he is actually a wizard and has been invited to attend
          the Hogwarts School for Witchcraft and Wizardry. Harry is snatched away from his mundane existence by Rubeus Hagrid
          (Robbie Coltrane), the groundskeeper for Hogwarts, and quickly thrown into a world completely foreign to both him
          and the viewer. Famous for an incident that happened at his birth, Harry makes friends easily at his new school. He 
          soon finds, however, that the wizarding world is far more dangerous for him than he would have imagined, and he quickly
           learns that not all wizards are ones to be trusted.</p>
        </div>
        <a href="#" id="bet-btn">PLACE THE BET NOW!</a>
      </div>
    </main>
		<footer><?php require_once "footer.php"; ?></footer>
  </body>
</html>