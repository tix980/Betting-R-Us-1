<?php
use BettingRUs\Models\{Database, Blog};

include "Views/header.php";
require_once "vendor/autoload.php";

$db = Database::getDb();
$b = new Blog();
$blogs = $b->getAllBlogs(Database::getDb());

$adminBtn = "";
$userType = $_SESSION['accounttype'];


if ($userType == 'admin'){
    $adminBtn = "style='display:block;'";
} else {
    $adminBtn = "style='display:none;'";
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
        <link rel="stylesheet" href="css/blogs.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <title>Blogs</title>
    </head>
    <body>
        <main>

            <div class="container blogs">
                <h1>Upcoming Releases</h1>
                <?php foreach ($blogs as $blog) { ?>
                <div class="blog-post">


                    <h2><?= $blog['title']; ?></h2>
                    <div class="author-releasedate">
                        <p><?= $blog['author_fname'] . ' '.  $blog['author_lname']; ?></p>
                        <p><?= $blog['date']; ?></p>
                    </div>
                    <img src="<?=  './images/'.  $blog['imagefile'];?>" alt="Blog post image placeholder">
                    <p>
                        <?= $blog['post']; ?>
                    </p>

                </div>
                <?php } ?>
            </div>

        </main>
    <div <?php echo $adminBtn; ?>>
        <a class="btn btn-primary" href="Blogs/list_blog.php" role="button">Admin List</a>
    </div>

    <?php include "Views/footer.php";
    ?>
    </body>
</html>