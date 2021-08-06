<?php
use BettingRUs\Models\{Database, ContactFeedback};
//wnzmkpmmncuqenxa
// require_once "Models/Database.php";
// require_once "Models/ContactFeedback.php";
require_once "vendor/autoload.php";
require_once 'contactUs/contactFunction.php';
require_once'contactUs/contactValidation.php';
$formSentMessage = "";
$errors = "";

//var_dump($_POST);
if(isset($_POST['addContactFeedback'])) {
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $contactNumber = isset($_POST['telephone']) ? $_POST['telephone'] : "";
    $enquiry = isset($_POST['enquiry']) ? $_POST['enquiry'] : "";
    $message = isset($_POST['description']) ? $_POST['description'] : "";

    //STORE THE VALIDATE FUNCTION TO THE VARIABLE
    $errors = validateContactForm($firstname,$lastname,$email, $contactNumber, $enquiry, $message,$errors);

    //IF THE ERROR MESSAGE IS EMPTY ,THEN EXECUTE THE CLASS TO STORE THE INFORMATION TO THE DATABASE AND ALSO SENT AN EMAIL
    if (empty($errors)) {
        $db = Database::getDb();
        $s = new ContactFeedback();
        $r = $s->addContactFeedback($firstname, $lastname, $email, $contactNumber, $enquiry, $message, $db);

        //IF IF THE INFORMATION STORED TO THE DATABASE IS SUCCESSFUL, THEN SEND IT TO THE EMAIL
        if ($r) {
            $formSentMessage = "Thank you for your Valuable enquiry and Feedback $firstname, your form has been successfully submitted";
            require_once 'contactUs/message.php';
        } else {
            $formSentMessage = "Problem adding your request";
        }
    }
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
    <link  rel="stylesheet" type="text/css" href="css/contact-bet-history.css">
    <link  rel="stylesheet" type="text/css" href="css/main.css">
    <meta name="viewport" content="width=device-width">
</head>
<body>
<?php
require 'Views/header.php';
?>
<main id="main">
<section id="contact-us-section">

<div class= "contact-us-heading-div">
        <h1 class="contact-us-heading">Get in Touch with us</span></h1>
        <p>Please fill in the form in order for us to contact you</p>
    <p class="successMessage"><?= $formSentMessage; ?></p>
    <p class="successMessage"><?= $errors; ?></p>
    </div>
<div class="contact-us-content">
    <div class="contact-no">
        <h3>Customer Support helpline Number:</h3>
        <p>+1800 345 656</p>
    </div>

    <div class="contact-no">
        <h3>Address:</h3>
        <p>3702 thAve<span>Calgary,Alberta</span><span>T2P 1M6</span></p>
    </div>
<div class="contact-us-image">
    <img class="image contact-no" src="images/contact-us-image-hello.jpg" alt="image of a Hello signboard" />
</div>
</div>
<div class="contact-us-form-section">
    <div class="contact-us-form-container ">
        <form method="post" name="contact_us_form" action="">
            <div class="form-line">
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder=" Enter First Name">
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname"  name="lastname" placeholder=" Enter Last Name" >
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder=" Enter Email id" >
                </div>
                <div class="form-group">
                    <label for="telephone">Contact No</label>
                    <input  type="text" class="form-control" name="telephone" id="telephone" placeholder=" Enter 10-digit mobile no NNN-NNN-NNNN." >
                </div>
                <div class="form-group" >
                    <label  for="enquiry">Enquiry Type</label>
                    <select id="enquiry" name="enquiry" class="form-control">
                    <?php
                    $enquiryType =  ['select'=>'Select one','feedback'=>'FeedBack','marketing'=>'Marketing','finance'=>'Finance Related','general'=>'General'];
                echo populateDropdown($enquiryType);
            ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for ="description"> Message</label>
                    <textarea  class="form-control" name="description" id="description" placeholder="Enter Your Message"></textarea>
                </div>
                <div>
                 <button type="submit" class="btn-bet btn-primary" name="addContactFeedback" id="btn-submit">Submit</button>
            </div>
                </div>

          </form>
    </div>
</div>
    <a class="btn btn-primary" href="contactUs/list_contactus.php" role="button">Admin List</a>

</section>
</main>

<?php
require 'Views/footer.php';
?>
</body>
</html>
