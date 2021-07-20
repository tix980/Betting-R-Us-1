<?php
use BettingRUs\Models\{Database, ContactFeedback};

require_once "Models/Database.php";
require_once "Models/ContactFeedback.php";
require_once "vendor/autoload.php";

var_dump($_POST);
if(isset($_POST['addContactFeedback'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $contactNumber = $_POST['telephone'];
    $enquiry = $_POST['enquiry'];
    $message = $_POST['description'];

    $db = Database::getDb();
    $s = new ContactFeedback();
    $r = $s->addContactFeedback($firstname, $lastname, $email, $contactNumber, $enquiry, $message, $db);

    if ($r) {
        echo "success";
    } else {
        echo "problem adding a Request";
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
require 'header.php';
?>
<main id="main">
<section id="contact-us-section">

<div class= "contact-us-heading-div">
        <h1 class="contact-us-heading">Get in Touch with us</span></h1>
        <p>Please fill in the form in order for us to contact you</p>
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
                    <input type="text" class="form-control" id="lastname"  name="lastname" placeholder=" Enter Last Name">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder=" Enter Email id">
                </div>
                <div class="form-group">
                    <label for="telephone">Contact No</label>
                    <input  type="text" class="form-control" name="telephone" id="telephone" placeholder=" Enter 10-digit mobile no.">
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
                    <textarea  class="form-control" name="description" id="description" placeholder="Enter Your Message"></textarea>
                </div>
                <div>
                 <button type="submit" class="btn-bet btn-primary" name="addContactFeedback" id="btn-submit">Submit</button>
            </div>
                </div>

          </form>
    </div>
</div>

</section>
</main>

<?php
require 'footer.php';
?>
</body>
</html>