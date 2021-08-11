<?php
use BettingRUs\Models\{Database, Faq};
require_once "../vendor/autoload.php";
require_once "../Models/Database.php";
require_once "../Models/Faq.php";

$question = $answer = "";
if(isset($_POST['updateFaq'])){

    $id = $_POST['id'];
    $db = Database::getDb();

    $f = new Faq();
    $faq = $f->getFaqWithId($id, $db);

    $question = $faq->question;
    $answer = $faq->answer;
}

if(isset($_POST['updFaq'])){
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $id = $_POST['id'];

    $db = Database::getDb();

    $f = new Faq();
    $faq = $f->updateFaq($id, $question, $answer, $db);

    if($faq){
        header("Location: list_faq.php");
    } else {
        echo "problem updating a faq";
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
    <link rel="stylesheet" href="../css/faq.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <title>Update Faq</title>
</head>
<body>

    <!--   Update Faq Form     -->

    <div class="faq-page" style="margin-top: 2em">
        <h1>Update FAQ</h1>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <div class="form-group">
                <label for="question">Question:</label>
                <input type="text" class="form-control" name="question" id="question" value="<?= $question ?>" placeholder="Enter New Question">
            </div>
            <div class="form-group">
                <label for="answer">Answer:</label>
                <input type="text" class="form-control" name="answer" id="answer" value="<?= $answer ?>" placeholder="Enter New Answer">
            </div>
            <button type="submit" name="updFaq" class="btn btn-primary" id="btn-submit">
                Update Faq
            </button>
            <div class="form-group">
                <a href="./list_faq.php" id="btn_back" class="btn btn-success">Back to faqs</a>
            </div>

    </div>

    </form>
    </div>

</body>
