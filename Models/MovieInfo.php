<?php
namespace BettingRUs\Models;
class MovieInfo{
	Public function selectActorByMovieId($db,$id){
		$sql = "SELECT actors.actor_fname as actor_fname, actors.actor_lname  as actor_lname FROM movie_actor join movies on movies.id = movie_actor.movie_id join actors on actors.id = movie_actor.actor_id WHERE movies.id = :id";
		$pdostm = $db ->prepare($sql);
		$pdostm->bindParam(':id',$id);
		$pdostm->execute();
		$m = $pdostm ->fetchAll(\PDO::FETCH_OBJ);

    return $m;
  }

	public function selectDirectorByMovieId($db,$id){
		$sql = "SELECT * FROM movie_director join movies on movies.id = movie_actor.movie_id join directors on director.id = movie_director.director_id WHERE movie.id = :id";
		$pdostm = $db ->prepare($sql);
		$pdostm->bindParam(':id',$id);
		$pdostm->execute();
		$m = $pdostm ->fetch(\PDO::FETCH_OBJ);

    return $m;
  }

  public function getMovieWithId($id, $db) {
	    $sql = "SELECT * FROM movies where id = :id";

      $pdostm = $db->prepare($sql);
      $pdostm->bindParam(':id', $id);
      $pdostm->execute();

      $movies = $pdostm->fetch(\PDO::FETCH_OBJ);
      return $movies;

  }

	public function listMovies($db){
		$sql = "SELECT title, id, poster,movie_background FROM movies";
		$pdostm = $db ->prepare($sql);
		$pdostm->execute();
		$m = $pdostm ->fetchAll(\PDO::FETCH_OBJ);

		return $m;
	}

	public function listActors($db){
		$sql = "SELECT actor_fname, actor_lname FROM actors";
		$pdostm = $db ->prepare($sql);
		$pdostm->execute();
		$m = $pdostm ->fetchAll(\PDO::FETCH_OBJ);

		return $m;
	}

	public function selectedMovie($id,$db){
		$sql="SELECT * FROM movies WHERE id = :id";
		$pdostm = $db->prepare($sql);
		$pdostm->bindParam(':id',$id);
		$pdostm->execute();
		$selectedMovie = $pdostm->fetch(\PDO::FETCH_OBJ);
		return $selectedMovie;
	}

	public function movieInfoFunction($db,$id){
		$sql = "SELECT movies.title as movieTitle, movies.release_date as releaseDate, movies.movie_background as movieBackGround, actors.actor_fname as actorFname, actors.actor_lname as actorLname FROM movie_actor join movies on movies.id = movie_actor.movie_id join actors on actors.id = movie_actor.actor_id WHERE movies.id = :id";
		$pdostm = $db ->prepare($sql);
		$pdostm->bindParam(':id',$id);
		$pdostm->execute();
		$m = $pdostm ->fetch(\PDO::FETCH_OBJ);

		return $m;
	}

    public function previousMovieInfoFunction($db,$id){
        $sql = "SELECT movies.title as movieTitle, movies.release_date as releaseDate, movies.movie_background as movieBackGround, movies.summary as movieSummary, budget, gross, rating, actors.actor_fname as actorFname, actors.actor_lname as actorLname FROM movie_actor join movies on movies.id = movie_actor.movie_id join actors on actors.id = movie_actor.actor_id WHERE movies.id = :id";
        $pdostm = $db ->prepare($sql);
        $pdostm->bindParam(':id',$id);
        $pdostm->execute();
        $m = $pdostm ->fetch(\PDO::FETCH_OBJ);

        return $m;
    }

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

	public function addActor($actorFirstName, $actorLastName,$birthDate,$birthCity,$biography,$db){
		$sql = "INSERT INTO actors(actor_fname,actor_lname,date_of_birth,birth_city,biography) VALUES(:actorFirstName,:actorLastName,:birthDate,:birthCity,:biography)";
		$pdostm = $db ->prepare($sql);
		$pdostm->bindParam(':actorFirstName',$actorFirstName);
		$pdostm->bindParam(':actorLastName',$actorLastName);
		$pdostm->bindParam(':birthDate',$birthDate);
		$pdostm->bindParam(':birthCity',$birthCity);
		$pdostm->bindParam(':biography',$biography);

		$count = $pdostm ->execute();
		return $count;
	}

	public function addDirector($directorFirstName, $directorLastName,$birthDate,$birthCity,$biography,$db){
		$sql = "INSERT INTO actors(director_fname,director_lname,date_of_birth,birth_city,biography) VALUES(:directorFirstName,:directorLastName,:birthDate,:birthCity,:biography)";
		$pdostm = $db ->prepare($sql);
		$pdostm->bindParam(':directorFirstName',$directorFirstName);
		$pdostm->bindParam(':actorLastName',$directorLastName);
		$pdostm->bindParam(':birthDate',$birthDate);
		$pdostm->bindParam(':birthCity',$birthCity);
		$pdostm->bindParam(':biography',$biography);

		$count = $pdostm ->execute();
		return $count;
	}

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

	public function updateActor($id,$actorFirstName, $actorLastName,$birthDate,$birthCity,$biography,$db){
		$sql = "UPDATE actors SET actor_fname = :actorFirstName, actor_lname = :actorLastName, date_of_birth = :birthDate, birth_city = :birthCity, biography = :biography, WHERE id = :id ";
		$pdostm = $db ->prepare($sql);
		$pdostm->bindParam(':actorFirstName',$actorFirstName);
		$pdostm->bindParam(':actorLastName',$actorLastName);
		$pdostm->bindParam(':birthDate',$birthDate);
		$pdostm->bindParam(':birthCity',$birthCity);
		$pdostm->bindParam(':biography',$biography);
		$pdostm->bindParam(':id',$id);

		$count = $pdostm ->execute();
		return $count;
	}

	public function updateDirector($id,$directorFirstName, $directorLastName,$birthDate,$birthCity,$biography,$db){
		$sql = "UPDATE directors SET director_fname = :directorFirstName, director_lname = :directorLastName, date_of_birth = :birthDate, birth_city = :birthCity, biography = :biography, WHERE id = :id ";
		$pdostm = $db ->prepare($sql);
		$pdostm->bindParam('::directorFirstName',$directorFirstName);
		$pdostm->bindParam(':directorLastName',$directorLastName);
		$pdostm->bindParam(':birthDate',$birthDate);
		$pdostm->bindParam(':birthCity',$birthCity);
		$pdostm->bindParam(':biography',$biography);
		$pdostm->bindParam(':id',$id);

		$count = $pdostm ->execute();
		return $count;
	}

	public function deleteMovie($id,$db){
		$sql = "DELETE FROM movies WHERE id = :id";
		$pdostm = $db ->prepare($sql);

		$pdostm->bindParam(':id',$id);
		$count = $pdostm ->execute();
		return $count;

	}

	public function deleteActor($id,$db){
		$sql = "DELETE FROM actors WHERE id = :id";
		$pdostm = $db ->prepare($sql);

		$pdostm->bindParam(':id',$id);
		$count = $pdostm ->execute();
		return $count;

	}

	public function deleteDirector($id,$db){
		$sql = "DELETE FROM directors WHERE id = :id";
		$pdostm = $db ->prepare($sql);

		$pdostm->bindParam(':id',$id);
		$count = $pdostm ->execute();
		return $count;

	}


}
