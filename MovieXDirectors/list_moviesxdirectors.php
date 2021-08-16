<?php
use BettingRUs\Models\{Database,MovieInfo};

require_once "../vendor/autoload.php";

$c = new MovieInfo();
$listMovieDirectors = $c->listMoviesxDirectors(Database::getDb());

if($listMovieDirectors){
    echo "Success";
}else{
    echo "error-loading page";
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Movies and Directors</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link  rel="stylesheet" type="text/css" href="../css/contact-bet-history.css">
    <link  rel="stylesheet" type="text/css" href="../css/main.css">
    <meta name="viewport" content="width=device-width">
</head>
<body>

<a class="btn btn-primary" href="../list-movies.php" role="button">Back to movie list</a>
<a class="btn btn-primary" href="./add_moviexdirector.php" role="button">Add MovieXDirector</a>
<p class="h1 text-center">Movies and Directors Relations</p>
<div class="m-1" >
    <!--    Displaying Data in Table-->
    <table class="table table-bordered tbl" style="color: white;">
        <thead>
        <tr>
            <th scope="col">Movie Title</th>
            <th scope="col">Actor First Name</th>
            <th scope="col">Actor Last Name</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($listMovieDirectors as $info) { ?>
            <tr>
                <td><?= $info->title ?></td>
                <td><?= $info->director_fname; ?></td>
                <td><?= $info->director_lname; ?></td>

                <td>
                    <form action="delete_moviexdirector.php" method="post">
                        <input type="hidden" name="movie_id" value="<?= $info->movie_id ?>"/>
                        <input type="hidden" name="director_id" value="<?= $info->director_id ?>"/>
                        <input type="submit" class="button btn btn-danger" name="deleteMoviexDirector" value="Delete"/>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php
//include '../footer.php';
//?>
</body>
</html>
