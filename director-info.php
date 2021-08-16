<?php
use BettingRUs\Models\{Database, MovieInfo};


require_once "vendor/autoload.php";
require_once "Models/Database.php";
require_once "Models/MovieInfo.php";

$directorFname =$directorLname= $title= $poster= $birthCity= $birthDate= $biography="";
$m = new MovieInfo();
$db = Database::getDb();

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $m = new MovieInfo();
    $selectDirector = $m->getDirectorWithId($id,$db);

//	var_dump($selectdirector);

    $directorFname = $selectDirector->director_fname;
    $directorLname = $selectDirector->director_lname;
    $dateOfBirth = $selectDirector->date_of_birth;
    $birthCity = $selectDirector->birth_city;
    $biography = $selectDirector->biography;
    $poster = $selectDirector->poster;


    $e = new MovieInfo();
    $movies = $e->selectDirectorMoviesByDirectorId($db, $id);
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
    <title>Director Info</title>
</head>
<body>
<header><?php require_once "Views/header.php"; ?></header>
<main>
    <?php
    (string)$userType = $_SESSION['accounttype'];
    if($userType == 'admin') {
        $adminBtn = "style='display:block;'";

    } else {
        $adminBtn = "style='display:none;'";
    }
    ?>
    <div <?php echo $adminBtn ?>>
    <form action="./MovieDirectors/update_director.php" method="post">
        <input type="hidden" name="id" value="<?= $id ?>"/>
        <input type="submit" class="button btn btn-primary" name="updateDirector" value="Update"/>
    </form>
    </div>
    <div <?php echo $adminBtn ?>>
    <form action="./MovieDirectors/delete_director.php" method="post">
        <input type="hidden" name="id" value="<?= $id ?>"/>
        <input type="submit" class="button btn btn-danger" name="deleteDirector" value="Delete"/>
    </form>
    </div>
    <div class="page-container">
        <div class="back-btn-container ">
            <a href="list_directors.php" class="btn-danger">Back to directors List</a>
            <a href="list-movies.php" class="btn-danger">Back to Movies List</a>
        </div>

        <h1><?= $directorFname ." " . $directorLname ?>  </h1>
        <div class="flex-container">
            <div class="movie-img-container movie-director-img">
                <img src="images/directors/<?=  $poster ?>" style="width: 500px">
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


                        <li class="directors-name"><a name="selectMovie" href="movie-info.php?id=<?= $movie->id ?>"> <?php echo $movie->title ?></a></li>

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
