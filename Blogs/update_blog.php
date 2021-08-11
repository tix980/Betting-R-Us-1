<?php
use BettingRUs\Models\{Database, Blog};
require_once "../vendor/autoload.php";
require_once "../Models/Database.php";
require_once "../Models/Blog.php";

$date = $author_fname = $author_lname = $post = $title = $imagefile = "";
if(isset($_POST['updateBlog'])){
    $id = $_POST['id'];
    $db = Database::getDb();

    $b = new Blog();
    $blog = $b->getBlogWithId($id, $db);

    $date = $blog->date;
    $author_fname = $blog->author_fname;
    $author_lname = $blog->author_lname;
    $post = $blog->post;
    $title = $blog->title;
    $imagefile = $blog->imagefile;
}

if(isset($_POST['updBlog'])){
    $date = $_POST['date'];
    $author_fname = $_POST['author_fname'];
    $author_lname = $_POST['author_lname'];
    $post = $_POST['post'];
    $title = $_POST['title'];
    $imagefile = $_POST['imagefile'];
    $id = $_POST['id'];

    $db = Database::getDb();

    $b = new Blog();
    $blog = $b->updateBlog($id, $date, $author_fname, $author_lname, $post, $title, $imagefile, $db);

    if($blog){
        header("Location: list_blog.php");
    } else {
        echo "problem updating blog";
    }
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
        <link rel="stylesheet" href="../css/blogs.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <title>Update Faq</title>
    </head>
    <body>
    <!--  Update Blog Form  -->
    <h1>Update Blog</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" name="date" id="date" value="<?= $date ?>" placeholder="Enter Date">
        </div>
        <div class="form-group">
            <label for="author_fname">Author First Name:</label>
            <input type="text" class="form-control" name="author_fname" id="author_fname" value="<?= $author_fname ?>" placeholder="Author First Name">
        </div>
        <div class="form-group">
            <label for="author_lname">Author Last Name:</label>
            <input type="text" class="form-control" name="author_lname" id="author_lname" value="<?= $author_lname ?>" placeholder="Author Last Name">
        </div>
        <div class="form-group">
            <label for="title">Blog Title:</label>
            <input type="text" class="form-control" name="title" id="title" value="<?= $title ?>" placeholder="Blog Title">
        </div>
        <div class="form-group">
            <label for="post">Post:</label>
            <input type="text" class="form-control" name="post" id="post" value="<?= $post ?>" placeholder="Post">
        </div>
        <div class="form-group">
            <input type="file" name="imagefile" id="imagefile" value="<?= $imagefile ?>">
        </div>
        <button type="submit" name="updBlog" class="btn btn-primary" id="btn-submit">
            Update Blog
        </button>
        <div class="form-group">
            <a href="./list_blog.php" id="btn_back" class="btn btn-success">Back to blogs</a>
        </div>


        </div>


    </form>
    </body>



