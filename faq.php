<?php
use BettingRUs\Models\{Database, Faq};

require_once "errorhandle.php";
require_once "Views/header.php";
require_once "Models/Database.php";
 require_once "Models/Faq.php";
require_once "vendor/autoload.php";

$db = Database::getDb();
$f = new Faq();
$faqs = $f->getAllFaqs(Database::getDb());
$adminBtn = "";

(string)$userType = $_SESSION['accounttype'];


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
    <link rel="stylesheet" href="css/faq.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>FAQ</title>
</head>
<body>
<div class="container-md faq-page">
    <h1>FAQ</h1>


    <div class="accordion faq-section" id="accordionExample">

        <h2>Frequently Asked Questions</h2>
        <?php foreach ($faqs as $faq) { ?>
            <div class="card">
                <div class="card-header" id="<?= $faq['id']; ?>">
                    <h5 class="mb-0">
                        <button class="question-header btn-link" type="button" data-toggle="collapse" data-target="#collapse<?= $faq['id']; ?>" aria-expanded="true" aria-controls="collapse<?= $faq['id']; ?>">
                            <?= $faq['question']; ?>
                        </button>
                    </h5>
                </div>

                <div id="collapse<?= $faq['id']; ?>" class="collapse" aria-labelledby="<?= $faq['id']; ?>" data-parent="#accordionExample">
                    <div class="card-body question-answer">
                        <?= $faq['answer']; ?>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>

</div>

<div <?php echo $adminBtn; ?>>
    <a class="btn btn-primary" href="Faqs/list_faq.php" role="button">Admin List</a>
</div>

<footer><?php require_once "Views/footer.php"; ?></footer>







</body>



</html>
