<?php
use BettingRUs\Models\{Database, Blog};
require_once "../vendor/autoload.php";

if(isset($_POST['addBlog'])){
    $file = $_FILES['imagefile'];

    $fileName = $_FILES['imagefile']['name'];
    print_r($file);
    $fileNameTmpName = $_FILES['imagefile']['tmp_name'];
    $fileNameSize = $_FILES['imagefile']['size'];
    $fileNameError = $_FILES['imagefile']['error'];
    $fileNameType = $_FILES['imagefile']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($fileActualExt, $allowed)){
        if($fileNameError === 0) {
            if ($fileNameSize < 1000000) {
//                $fileNameNew = uniqid('', true). ".".$fileActualExt;

                $fileDestination = '../images/'.$fileName;
                move_uploaded_file($fileNameTmpName, $fileDestination);
                $date = $_POST['date'];
                $author_fname = $_POST['author_fname'];
                $author_lname = $_POST['author_lname'];
                $post = $_POST['post'];
                $title = $_POST['title'];
                $imagefile = $fileName;

                $db = Database::getDb();
                $b = new Blog();
                $blogs = $b->addBlog($date, $author_fname, $author_lname, $post, $title, $imagefile, $db);

                if($blogs) {
                    echo "Added blog successfully";
                } else {
                    echo "Problem adding blog";
                }
                header("Location: list_blog.php?uploadsuccess");
            } else {
                echo "Your file is too big";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type";
    }

    //////
//    $date = $_POST['date'];
//    $author_fname = $_POST['author_fname'];
//    $author_lname = $_POST['author_lname'];
//    $post = $_POST['post'];
//    $title = $_POST['title'];
//    $imagefile = $_POST[$_FILES['']];
//
//    $db = Database::getDb();
//    $b = new Blog();
//    $blogs = $b->addBlog($date, $author_fname, $author_lname, $post, $title, $imagefile, $db);
//
//    if($blogs) {
//        echo "Added blog successfully";
//    } else {
//        echo "Problem adding blog";
//    }

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
        <link rel="stylesheet" href="../css/blog.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <title>Add Blog</title>
    </head>
    <body>
    <!-- Add new Blog Form  -->
        <h1>Add Blog</h1>

    <form action="#" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" name="date" id="date" placeholder="Enter Date">
        </div>
        <div class="form-group">
            <label for="author_fname">Author First Name:</label>
            <input type="text" class="form-control" name="author_fname" id="author_fname" placeholder="Author First Name">
        </div>
        <div class="form-group">
            <label for="author_lname">Author Last Name:</label>
            <input type="text" class="form-control" name="author_lname" id="author_lname" placeholder="Author Last Name">
        </div>
        <div class="form-group">
            <label for="title">Blog Title:</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Blog Title">
        </div>
        <div class="form-group">
            <label for="post">Post:</label>
            <input type="text" class="form-control" name="post" id="post" placeholder="Post">
        </div>
        <div class="form-group">
            <input type="file" name="imagefile" id="imagefile">
        </div>
<!--        <div class="form-group">-->
<!--            <input type="name" name="imagefile" id="imagefile">-->
<!--        </div>-->
        <div class="form-group">
            <a href="./list_blog.php" id="btn_back" class="btn btn-success">Back to faqs</a>
        </div>
        <button type="submit" name="addBlog" class="btn btn-primary" id="btn-submit">
            Add Blog
        </button>
        </div>


    </form>
<!--    <form action="blogs_upload.php" method="post" enctype="multipart/form-data">-->
<!--        <input type="file" name="imagefile">-->
<!--        <button type="submit" name="submit">Upload Image</button>-->
<!--    </form>-->

    </body>