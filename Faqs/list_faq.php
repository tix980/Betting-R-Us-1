<?php
use BettingRUs\Models\{Database, Faq};
require_once "../vendor/autoload.php";

$db = Database::getDb();
$f = new Faq();
$faqs = $f->getAllFaqs(Database::getDb());

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
    <title>List Faq</title>
</head>
<div class="faq-page">
    <h1>List of Faqs</h1>
    <table class="table table-bordered tbl">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Question</th>
            <th scope="col">Answer</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($faqs as $faq) { ?>
            <tr>
                <th><?= $faq['id']; ?></th>
                <td><?= $faq['question']; ?></td>
                <td><?= $faq['answer']; ?></td>
                <td>
                    <form action="./update_faq.php" method="post">
                        <input type="hidden" name="id" value="<?= $faq['id']; ?>"/>
                        <input type="submit" class="button btn btn-primary" name="updateFaq" value="Update"/>
                    </form>
                </td>
                <td>
                    <form action="./delete_faq.php" method="post">
                        <input type="hidden" name="id" value="<?= $faq['id']; ?>"/>
                        <input type="submit" class="button btn btn-danger" name="deleteFaq" value="Delete"/>
                    </form>
                </td>
            </tr>


        <?php } ?>
        </tbody>
    </table>
    <a href="../faq.php" class="btn btn-secondary btn-lg float-left">Back to main</a>
    <a href="./add_faq.php" id="btn_addFaq" class="btn btn-success btn-lg float-right">Add Faq</a>

</div>

