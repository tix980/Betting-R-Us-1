<?php
use BettingRUs\Models\{Database, ContactFeedback};

//require_once "../Models/Database.php";
//require_once "../Models/ContactFeedback.php";
require_once "../vendor/autoload.php";
var_dump($_POST);
if(isset($_POST['updateContactFeedback'])){
    $id= $_POST['id'];

    $db = Database::getDb();

    $s = new ContactFeedback();
    $contactInfo = $s->getContactFeedbackById($id, $db);

    $firstname = $contactInfo->firstname;
    $lastname = $contactInfo->lastname;
    $email =  $contactInfo->email;
    $contactNumber = $contactInfo->contact_number;
    $enquiry = $contactInfo->enquiry;
    $message = $contactInfo->message;


}
if(isset($_POST['updCar'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $contactNumber = $_POST['telephone'];
    $enquiry = $_POST['enquiry'];
    $message = $_POST['message'];



    $db = Database::getDb();
    $s = new ContactFeedback();
    $count = $s->updateContactFeedback($firstname, $lastname,$email,$contactNumber,$enquiry,$message, $db);

    if($count){
        header("Location: contactUs/list_contactus.php");
    } else {
        echo "problem updating a car";
    }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Update ContactUs</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link  rel="stylesheet" type="text/css" href="../css/contact-bet-history.css">
    <link  rel="stylesheet" type="text/css" href="../css/main.css">
    <meta name="viewport" content="width=device-width">
</head>
<body>
<?php
//require '../header.php';
//?>
<section>
<div class="contact-us-form-section">
    <div class="contact-us-form-container ">
        <form method="post" name="contact_us_form" action="">
            <input type="hidden" name="id" value="<?= $id; ?>" />
            <div class="form-line">
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder=" Enter First Name" value="<?= $firstname; ?>">
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname"  name="lastname" placeholder=" Enter Last Name" value="<?= $lastname; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder=" Enter Email id" value="<?= $email; ?>">
                </div>
                <div class="form-group">
                    <label for="telephone">Contact No</label>
                    <input  type="text" class="form-control" name="telephone" id="telephone" placeholder=" Enter 10-digit mobile no." value="<?= $contactNumber; ?>">
                </div>
                <div class="form-group" >
                    <label  for="enquiry">Enquiry Type</label>
                    <?php
                    $enquiryType =  array('Select one','FeedBack','Marketing','Finance Related','General');
                    $enquiryList = '';
                    foreach($enquiryType as $key => $value){
                        $enquiryList .= "<option value='$value'> " . $value . "</option>";
                    }
                    echo "<select class='form-select' name = 'enquiry'> $enquiryList </select>"
                    ?>
                    <span><?= isset($enquiryErr) ? $enquiryErr: ""; ?></span>
                </div>
                <div class="form-group">
                    <label for ="description"> Message</label>
                    <textarea  class="form-control" name="description" id="description" placeholder="Enter Your Message" ><?= $message; ?></textarea>
                </div>
                <div>
                    <button type="submit" class="btn-bet btn-primary" id="updateContactFeedback ">Update</button>
                </div>
            </div>

        </form>
    </div>
</div>
</section>
<?php
//require '../footer.php';
//?>

</body>
</html>
