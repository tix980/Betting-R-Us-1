<?php
namespace BettingRUs\Models;
class MovieInfo{

	// Find actors that associated with the selected movie
	Public function selectActorByMovieId($db,$id){
		$sql = "SELECT actors.actor_fname as actor_fname, actors.actor_lname  as actor_lname ,actors.id FROM movie_actor join movies on movies.id = movie_actor.movie_id join actors on actors.id = movie_actor.actor_id WHERE movies.id = :id";
		$pdostm = $db ->prepare($sql);
		$pdostm->bindParam(':id',$id);
		$pdostm->execute();
		$m = $pdostm ->fetchAll(\PDO::FETCH_OBJ);

    return $m;
  }

  //Find directors that associated with the selected movie
	public function selectDirectorByMovieId($db,$id){
		$sql = "SELECT directors.director_fname as director_fname, directors.director_lname as director_lname , directors.id FROM movie_director join movies on movies.id = movie_director.movie_id join directors on directors.id = movie_director.director_id WHERE movies.id = :id";
		$pdostm = $db ->prepare($sql);
		$pdostm->bindParam(':id',$id);
		$pdostm->execute();
		$m = $pdostm ->fetch(\PDO::FETCH_OBJ);

    return $m;
  }

  // Find selected movie
  public function getMovieWithId($id, $db) {
	    $sql = "SELECT * FROM movies where id = :id";

      $pdostm = $db->prepare($sql);
      $pdostm->bindParam(':id', $id);
      $pdostm->execute();

      $movies = $pdostm->fetch(\PDO::FETCH_OBJ);
      return $movies;

  }

  //List all movies
	public function listMovies($db){
		$sql = "SELECT title, id, poster,movie_background FROM movies";
		$pdostm = $db ->prepare($sql);
		$pdostm->execute();
		$m = $pdostm ->fetchAll(\PDO::FETCH_OBJ);

		return $m;
	}

	//List top six movies
	public function listMoviesLimitSix($db){
		$sql = "SELECT title, id, poster,movie_background FROM movies LIMIT 6";
		$pdostm = $db ->prepare($sql);
		$pdostm->execute();
		$m = $pdostm ->fetchAll(\PDO::FETCH_OBJ);

		return $m;
	}

	//List top eight movies
	public function listMoviesLimitEight($db){
		$sql = "SELECT title, id, poster,movie_background FROM movies LIMIT 8";
		$pdostm = $db ->prepare($sql);
		$pdostm->execute();
		$m = $pdostm ->fetchAll(\PDO::FETCH_OBJ);

		return $m;
	}

	//List all actors
	public function listActors($db){
		$sql = "SELECT id, actor_fname, actor_lname,poster FROM actors";
		$pdostm = $db ->prepare($sql);
		$pdostm->execute();
		$m = $pdostm ->fetchAll(\PDO::FETCH_OBJ);

		return $m;
	}

	//List all directors
	public function listDirectors($db){

        $sql = "SELECT id, director_fname, director_lname,poster FROM directors";
        $pdostm = $db ->prepare($sql);
        $pdostm->execute();
        $m = $pdostm ->fetchAll(\PDO::FETCH_OBJ);

        return $m;
    }


    //Find selected movie
	public function selectedMovie($id,$db){
		$sql="SELECT * FROM movies WHERE id = :id";
		$pdostm = $db->prepare($sql);
		$pdostm->bindParam(':id',$id);
		$pdostm->execute();
		$selectedMovie = $pdostm->fetch(\PDO::FETCH_OBJ);
		return $selectedMovie;
	}

	//Find selected movie and actor information that are associated with the movie
	public function movieInfoFunction($db,$id){
		$sql = "SELECT movies.title as movieTitle, movies.release_date as releaseDate, movies.movie_background as movieBackGround, actors.actor_fname as actorFname, actors.actor_lname as actorLname ,actors.id FROM movie_actor join movies on movies.id = movie_actor.movie_id join actors on actors.id = movie_actor.actor_id WHERE movies.id = :id";
		$pdostm = $db ->prepare($sql);
		$pdostm->bindParam(':id',$id);
		$pdostm->execute();
		$m = $pdostm ->fetch(\PDO::FETCH_OBJ);


        return $m;
    }

	////Find selected movie, selected movie's box office record and actor information that are associated with the movie
    public function previousMovieInfoFunction($db,$id){
        $sql = "SELECT movies.title as movieTitle, movies.release_date as releaseDate, movies.movie_background as movieBackGround, movies.summary as movieSummary, budget, gross, rating, actors.actor_fname as actorFname, actors.actor_lname as actorLname FROM movie_actor join movies on movies.id = movie_actor.movie_id join actors on actors.id = movie_actor.actor_id WHERE movies.id = :id";
        $pdostm = $db ->prepare($sql);
        $pdostm->bindParam(':id',$id);
        $pdostm->execute();
        $m = $pdostm ->fetch(\PDO::FETCH_OBJ);

        return $m;
    }


    //Add movie function
  public function addMovie($movieTitle, $movieBudget,$movieGross,$movieReleaseDate,$rating,$summary,$genre,$poster,$background,$db){
		$sql = "INSERT INTO movies(title,budget,gross,release_date,rating,summary,genre,poster,movie_background) VALUES(:title,:budget,:gross,:release_date,:rating,:summary,:genre,:poster,:background)";
		$pdostm = $db ->prepare($sql);
		$pdostm->bindParam(':title',$movieTitle);
		$pdostm->bindParam(':budget',$movieBudget);
		$pdostm->bindParam(':gross',$movieGross);
		$pdostm->bindParam(':release_date',$movieReleaseDate);
		$pdostm->bindParam(':rating',$rating);
		$pdostm->bindParam(':summary',$summary);
		$pdostm->bindParam(':genre',$genre);
		$pdostm->bindParam(':poster',$poster);
		$pdostm->bindParam(':background',$background);

		$count = $pdostm ->execute();
		return $count;
	}

	//Add actor function
	public function addActor($actorFirstName, $actorLastName,$birthDate,$birthCity,$biography,$poster,$db){
		$sql = "INSERT INTO actors(actor_fname,actor_lname,date_of_birth,birth_city,biography,poster) VALUES(:actorFirstName,:actorLastName,:birthDate,:birthCity,:biography,:poster)";
		$pdostm = $db ->prepare($sql);
		$pdostm->bindParam(':actorFirstName',$actorFirstName);
		$pdostm->bindParam(':actorLastName',$actorLastName);
		$pdostm->bindParam(':birthDate',$birthDate);
		$pdostm->bindParam(':birthCity',$birthCity);
		$pdostm->bindParam(':biography',$biography);

        $pdostm->bindParam(':poster',$poster);
        $pdostm->bindParam(':background',$background);

        $count = $pdostm ->execute();
        return $count;
    }

    public function addActor($actorFirstName, $actorLastName,$birthDate,$birthCity,$biography,$poster,$db){
        $sql = "INSERT INTO actors(actor_fname,actor_lname,date_of_birth,birth_city,biography,poster) VALUES(:actorFirstName,:actorLastName,:birthDate,:birthCity,:biography,:poster)";
        $pdostm = $db ->prepare($sql);
        $pdostm->bindParam(':actorFirstName',$actorFirstName);
        $pdostm->bindParam(':actorLastName',$actorLastName);
        $pdostm->bindParam(':birthDate',$birthDate);
        $pdostm->bindParam(':birthCity',$birthCity);
        $pdostm->bindParam(':biography',$biography);
        $pdostm->bindParam(':poster',$poster);

	//Add director function
	public function addDirector($directorFirstName, $directorLastName,$birthDate,$birthCity,$biography,$poster, $db){
		$sql = "INSERT INTO directors(director_fname,director_lname,date_of_birth,birth_city,biography,poster) VALUES(:directorFirstName,:directorLastName,:birthDate,:birthCity,:biography,:poster)";
		$pdostm = $db ->prepare($sql);
		$pdostm->bindParam(':directorFirstName',$directorFirstName);
		$pdostm->bindParam(':directorLastName',$directorLastName);
		$pdostm->bindParam(':birthDate',$birthDate);
		$pdostm->bindParam(':birthCity',$birthCity);
		$pdostm->bindParam(':biography',$biography);

        $pdostm->bindParam(':poster',$poster);
        $pdostm->bindParam(':genre',$genre);
        $pdostm->bindParam(':background',$background);
        $pdostm->bindParam(':id',$id);


		$count = $pdostm ->execute();
		return $count;
	}

	//Update Movie function
	public function updateMovie($id,$movieTitle, $movieBudget,$movieGross,$movieReleaseDate,$rating,$summary,$genre,$poster,$background,$db){
		$sql = "UPDATE movies SET title = :title, budget = :budget, gross = :gross, release_date = :movieReleaseDate, rating = :rating, summary = :summary, genre= :genre, poster = :poster, movie_background = :background WHERE id = :id ";
		$pdostm = $db ->prepare($sql);
		$pdostm->bindParam(':title',$movieTitle);
		$pdostm->bindParam(':budget',$movieBudget);
		$pdostm->bindParam(':gross',$$movieGross);
		$pdostm->bindParam(':movieReleaseDate',$movieReleaseDate);
		$pdostm->bindParam(':rating',$rating);
		$pdostm->bindParam(':summary',$summary);
		$pdostm->bindParam(':genre',$genre);
		$pdostm->bindParam(':poster',$poster);
		$pdostm->bindParam(':genre',$genre);
		$pdostm->bindParam(':background',$background);
		$pdostm->bindParam(':id',$id);

		$count = $pdostm ->execute();
		return $count;
	}


	//Find selected actor
    public function selectedActor($id,$db){
        $sql="SELECT * FROM actors WHERE id = :id";
        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':id',$id);
        $pdostm->execute();
        $selectedActor = $pdostm->fetch(\PDO::FETCH_OBJ);
        return $selectedActor;
    }

    //Find selected director
    public function selectedDirector($id,$db){
        $sql="SELECT * FROM directors WHERE id = :id";
        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':id',$id);
        $pdostm->execute();
        $selectedDirector = $pdostm->fetch(\PDO::FETCH_OBJ);
        return $selectedDirector;
    }

    // Update selected actor
	public function updateActor($id,$actorFirstName, $actorLastName,$birthDate,$birthCity,$biography,$poster,$db){
		$sql = "UPDATE actors SET actor_fname = :actorFirstName, actor_lname = :actorLastName, date_of_birth = :birthDate, birth_city = :birthCity, biography = :biography, poster = :poster WHERE id = :id ";
		$pdostm = $db ->prepare($sql);
		$pdostm->bindParam(':actorFirstName',$actorFirstName);
		$pdostm->bindParam(':actorLastName',$actorLastName);
		$pdostm->bindParam(':birthDate',$birthDate);
		$pdostm->bindParam(':birthCity',$birthCity);
		$pdostm->bindParam(':biography',$biography);
        $pdostm->bindParam(':poster',$poster);
		$pdostm->bindParam(':id',$id);

		$count = $pdostm ->execute();
		return $count;
	}

	//Update selected director
	public function updateDirector($id,$directorFirstName, $directorLastName,$birthDate,$birthCity,$biography, $poster, $db){
		$sql = "UPDATE directors SET director_fname = :directorFirstName, director_lname = :directorLastName, date_of_birth = :birthDate, birth_city = :birthCity, biography = :biography,poster = :poster WHERE id = :id ";
		$pdostm = $db ->prepare($sql);
		$pdostm->bindParam(':directorFirstName',$directorFirstName);
		$pdostm->bindParam(':directorLastName',$directorLastName);
		$pdostm->bindParam(':birthDate',$birthDate);
		$pdostm->bindParam(':birthCity',$birthCity);
		$pdostm->bindParam(':biography',$biography);
    
        $pdostm->bindParam(':poster',$poster);
        $pdostm->bindParam(':id',$id);

        $count = $pdostm ->execute();
        return $count;
    }


	//Delete selected movie
	public function deleteMovie($id,$db){
		$sql = "DELETE FROM movies WHERE id = :id";
		$pdostm = $db ->prepare($sql);


        $pdostm->bindParam(':id',$id);
        $count = $pdostm ->execute();
        return $count;

    }

	//Delete selected actor
	public function deleteActor($id,$db){
		$sql = "DELETE FROM actors WHERE id = :id";
		$pdostm = $db ->prepare($sql);

        $pdostm->bindParam(':id',$id);
        $count = $pdostm ->execute();
        return $count;

    }


	//Delete selected director
	public function deleteDirector($id,$db){
		$sql = "DELETE FROM directors WHERE id = :id";
		$pdostm = $db ->prepare($sql);

        $pdostm->bindParam(':id',$id);
        $count = $pdostm ->execute();
        return $count;

    }

	//Find selected actor
    public function getActorWithId($id, $db) {
        $sql = "SELECT * FROM actors where id = :id";

        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();

        $movies = $pdostm->fetch(\PDO::FETCH_OBJ);
        return $movies;

    }
    //Find selected director
    public function getDirectorWithId($id, $db) {
        $sql = "SELECT * FROM directors where id = :id";

        $pdostm = $db->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();

        $directors = $pdostm->fetch(\PDO::FETCH_OBJ);
        return $directors;

    }

    //Join table for actor and movie
    Public function selectActorMoviesByActorId($db,$id){
        $sql = "SELECT movies.title  FROM movie_actor join actors on actors.id = movie_actor.actor_id inner join movies on movies.id = movie_actor.movie_id WHERE actors.id = :id";
        $pdostm = $db ->prepare($sql);
        $pdostm->bindParam(':id',$id);
        $pdostm->execute();
        $m = $pdostm ->fetchAll(\PDO::FETCH_OBJ);

        return $m;
    }

	//Join table for director and movie
    Public function selectDirectorMoviesByDirectorId($db,$id){
        $sql = "SELECT movies.title,movies.id  FROM movie_director join directors on directors.id = movie_director.director_id inner join movies on movies.id = movie_director.movie_id WHERE directors.id = :id";
        $pdostm = $db ->prepare($sql);
        $pdostm->bindParam(':id',$id);
        $pdostm->execute();
        $m = $pdostm ->fetchAll(\PDO::FETCH_OBJ);

        return $m;
    }

//  MOVE ACTOR BRIDGING FUCNTION

    public  function addMoviexActor($movieId, $actorId, $db){
        $sql = "INSERT INTO movie_actor(movie_id,actor_id) VALUES(:movieId,:actorId)";
        $pdostm = $db ->prepare($sql);
        $pdostm->bindParam(':movieId',$movieId);
        $pdostm->bindParam(':actorId',$actorId);
        $count = $pdostm ->execute();
        return $count;
    }

    public function listMoviesxActors($db){
        $sql = "SELECT movie_actor.id, movies.title, actors.actor_fname,actors.actor_lname FROM movie_actor inner join movies on movies.id = movie_actor.movie_id inner join actors on actors.id = movie_actor.actor_id";
        $pdostm = $db ->prepare($sql);
        $pdostm->execute();
        $m = $pdostm ->fetchAll(\PDO::FETCH_OBJ);

        return $m;
    }
    //MOVIE Director BRIDGING FUCNTION

    public  function addMoviexDirector($movieId, $directorId, $db){
        $sql = "INSERT INTO movie_director(movie_id,director_id) VALUES(:movieId,:directorId)";
        $pdostm = $db ->prepare($sql);
        $pdostm->bindParam(':movieId',$movieId);
        $pdostm->bindParam(':directorId',$directorId);
        $count = $pdostm ->execute();
        return $count;
    }
    public  function deleteMoviexDirector($movie_id, $director_id, $db){
        $sql = "DELETE FROM  movie_director WHERE movie_id = :movie_id && director_id = :director_id";
        $pdostm = $db ->prepare($sql);
        $pdostm->bindParam(':movie_id',$movie_id);
        $pdostm->bindParam(':director_id',$director_id);
        $count = $pdostm ->execute();
        return $count;
    }
    public  function findMoviexDirector($movie_id, $director_id, $db){
        $sql = "SELECT movie_director.movie_id as movie_id,movie_director.director_id as director_id, movies.title, directors.director_fname,directors.director_lname FROM movies JOIN  movie_director on movies.id = movie_director.movie_id join directors on movie_director.director_id = directors.id WHERE movie_id = :movie_id && director_id = :director_id";
        $pdostm = $db ->prepare($sql);
        $pdostm->bindParam(':movie_id',$movie_id);
        $pdostm->bindParam(':director_id',$director_id);
        $count = $pdostm ->execute();
        return $count;
    }

    public function listMoviesxDirectors($db){
        $sql = "SELECT movie_director.movie_id as movie_id,movie_director.director_id as director_id, movies.title, directors.director_fname,directors.director_lname FROM movies JOIN  movie_director on movies.id = movie_director.movie_id join directors on movie_director.director_id = directors.id";
        $pdostm = $db ->prepare($sql);
        $pdostm->execute();
        $m = $pdostm ->fetchAll(\PDO::FETCH_OBJ);

        return $m;
    }


}
