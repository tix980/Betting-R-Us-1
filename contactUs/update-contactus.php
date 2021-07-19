<?php
error_reporting(E_ALL);
use BettingRUs\Models\{Database, ContactFeedback};

require_once "../Models/Database.php";
require_once "../Models/ContactFeedback.php";
require_once "../vendor/autoload.php";
var_dump($_POST);

$firstname = $lastname = $email = $contactNumber= $enquiry = $message = $status ="";
if(isset($_POST['updateContactFeedback'])){
    $id= $_POST['id'];

    $db = Database::getDb();

    $s = new ContactFeedback();
    $contactInfo = $s->getContactFeedbackById($id, $db);

//    $enquiryId = $contactInfo->id;
    $firstname = $contactInfo->first_name;
    $lastname = $contactInfo->last_name;
    $email =  $contactInfo->email;
    $contactNumber = $contactInfo->contact_number;
    $enquiry = $contactInfo->enquiry_type;
    $message = $contactInfo->message;
    $status = $contactInfo->status;


}
if(isset($_POST['updContactFeedback'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $contactNumber = $_POST['telephone'];
    $enquiry = $_POST['enquiry'];
    $message = $_POST['message'];
    $status = $_POST['status'];

    $db = Database::getDb();
    $s = new ContactFeedback();
    $count = $s->updateContactFeedback($id,$firstname, $lastname,$email,$contactNumber,$enquiry,$message,$status, $db);

    if($count){
        echo "success";
    } else {
        echo "problem updating the form info";
    }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr" xmlns="http://www.w3.org/1999/html">
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

<section>
<div class="contact-us-form-section">
    <div class="contact-us-form-container ">
        <form method="post"  action="">
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
             </div>
                <div class="form-group">
                    <label for ="description"> Message</label>
                    <textarea  class="form-control" name="description" id="description" placeholder="Enter Your Message" ><?= $message; ?></textarea>
               </div>
                <div class="form-group" >
                <label  for="status">Status</label>
                    <?php
                    $statusType =  array('unresolved','resolved');
                    $statusList = '';
                    foreach($statusType as $key => $value){
                        $statusList .= "<option value= '$value'>" . $value . "</option>";
                    }
                    echo "<select class='form-select' name = 'status'> $statusList </select>"
                    ?>

                </div>
                <a href="list_contactus.php" id="btn_back" class="btn btn-success float-left">Back</a>
                <div>
                    <button type="submit" class="btn-bet btn-primary" name="updContactFeedback" id="btn-submit">Update</button>
                </div>
            </div>

        </form>
    </div>
</div>
</section>

</body>
</html>
