<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Contact-us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link  rel="stylesheet" type="text/css" href="css/contact-bet-history.css">
    <link  rel="stylesheet" type="text/css" href="css/main.css">
    <meta name="viewport" content="width=device-width">
</head>
<body>
<?php
require 'header.php';
?>
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
        <div class="contact-us-form-container">
            <form method="post" name="contact_us_form" >
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
                        <label for="exampleInputEmail">Email Address</label>
                        <input type="email" class="form-control" id="exampleInputEmail" placeholder=" Enter Email id">
                    </div>
                    <div class="form-group">
                        <label for="telephone">Contact No</label>
                        <input type="tel" class="form-control" id="telephone" placeholder=" Enter 10-digit mobile no.">
                    </div>
                    <div class="form-group" >
                        <label  for="enquiry">Enquiry Type</label>
                        <select class="form-select"  name="enquiry" id="enquiry" aria-label="Default select example">
                            <option selected>Please Select</option>
                            <option value="1">Payment</option>
                            <option value="2">Feedback</option>
                            <option value="3">Marketing</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for ="description"> Message</label>
                        <textarea  class="form-control" id="description" placeholder="Enter Your Message"></textarea>
                    </div>
                     <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

              </form>
        </div>
    </div>
</section>
<?php
require 'footer.php';
?>
</body>
</html>