<?php
use BettingRUs\Models\{Database, ContactFeedback};

//require_once "../Models/Database.php";
//require_once "../Models/ContactFeedback.php";
require_once "../vendor/autoload.php";

$c = new ContactFeedback();
$contactInfo = $c->getAllContactFeedback(Database::getDb());

if($contactInfo){
    echo "Success";
}else{
    echo "error-loading page";
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Contact-us</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link  rel="stylesheet" type="text/css" href="../css/contact-bet-history.css">
    <link  rel="stylesheet" type="text/css" href="../css/main.css">
    <meta name="viewport" content="width=device-width">
</head>
<body>
<?php
//include '../header.php';
//?>
<a class="btn btn-primary" href="../contact-us.php" role="button">User Contact form</a>
<p class="h1 text-center">FeedBacks and Enquiries</p>
<div class="m-1" >
    <!--    Displaying Data in Table-->
    <table class="table table-bordered tbl" style="color: white;">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Message Date</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Enquiry Type</th>
            <th scope="col">Message</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($contactInfo as $info) { ?>
            <tr>
                <td><?= $info->id ?></td>
                <td><?= $info->post_time ?></td>
                <td><?= $info->first_name ?></td>
                <td><?= $info->last_name ?></td>
                <td><?= $info->email ?></td>
                <td><?= $info->contact_number ?></td>
                <td><?= $info->enquiry_type ?></td>
                <td><?= $info->message ?></td>
                <td><?= $info->status ?></td>
                <td>
                    <form action="update-contactus.php" method="post">
                        <input type="hidden" name="id" value="<?= $info->id ?>"/>
                        <input type="submit" class="button btn btn-primary" name="updateContactFeedback" value="Update"/>
                    </form>
                </td>
                <td>
                    <form action="delete_contactus.php" method="post">
                        <input type="hidden" name="id" value="<?= $info->id ?>"/>
                        <input type="submit" class="button btn btn-danger" name="deleteContactFeedback" value="Delete"/>
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



