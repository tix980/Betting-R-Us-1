<?php
use BettingRUs\Models\{Database, Donation};

require_once "Views/header.php";
require_once "vendor/autoload.php";
//require_once "Models/Donation.php";
//require_once "Models/Database.php";
require_once "contactUs/contactFunction.php";

$errors = "";
//var_dump($_POST);
if(isset($_POST['addDonation'])){
    $donation_amount = $_POST['donation_amount'];
    $cc_number = $_POST['cc_number'];
    $cc_number_hashed = password_hash($cc_number, PASSWORD_DEFAULT);
    $cc_name = $_POST['cc_name'];
    $cc_code = $_POST['cc_code'];
    $cc_code_hashed = password_hash($cc_code, PASSWORD_DEFAULT);
    $cc_expiry_month = $_POST['cc_expiry_month'];
    $cc_expiry_year = $_POST['cc_expiry_year'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $charity = $_POST['charity'];


    $db = Database::getDb();
    $d = new Donation();
    $donations = $d->addDonation($donation_amount, $cc_number_hashed, $cc_name, $cc_code_hashed, $cc_expiry_month, $cc_expiry_year, $phone_number, $email, $charity, $db);



}
$adminBtn = "";
$userType = $_SESSION['accounttype'];


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
      <script src="https://kit.fontawesome.com/f4c9203469.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="css/donations.css" type="text/css">
      <link rel="stylesheet" href="css/main.css">
    <title>Donation's page</title>
  </head>
  <body>
    <div class="container">
      <h1>Donations</h1>
      <p>Feeling generous? Make a donation!</p>

      <form class="donation-form" method="post">
        <div class="row">
          <div class="col-md-6 col-xs-12">
            <span class="required-field">*</span>
            <label class="form-label">Credit Card Number</label>
            <input type="text" class="form-control" name="cc_number" placeholder="1111-2222-3333-4444" aria-label="Credit card number">
          </div>
          <div class="col-md-6 col-xs-12">
            <span class="required-field">*</span>
            <label class="form-label">Card Holder Name</label>
            <input type="text" class="form-control" name="cc_name" placeholder="Joe Doe" aria-label="Card holder name">
          </div>
        </div>
          <div class="row">
              <div class="col-md-6 col-xs-12">
                  <span class="required-field">*</span>
                  <label for="donation_amount" class="form-label">Donation Amount</label>
                  <select id="amount" class="form-select" name="donation_amount">
                      <?php
                      $amount = ['$5'=>'$5','$10'=>'$10','$20'=>'$20','$50'=>'$50'];
                      echo populateDropdown($amount);
                      ?>
                  </select>
              </div>
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <span class="required-field">*</span>
                    <label for="expiryDate" class="form-label">Expiry Date</label>
                    <select id="expiryDate" class="form-select" name="cc_expiry_month">
                        <?php
                        $expiryDate = ['MM' => 'MM','01' => '01', '02' => '02', '03'=>'03','04' => '04', '05' => '05', '06' => '06', '07' => '07', '08' => '08', '09' => '09', '10' => '10', '11' => '11', '12' => '12'];
                        echo populateDropdown($expiryDate, $cc_expiry_month);
                        ?>
                    </select>
                    <select id="expiryYear" class="form-select" name="cc_expiry_year">
                        <?php
                        $expiryYear = ['YY' => 'YY','21' => '21', '22' => '22', '23'=>'23','24' => '24', '25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30'];
                        echo populateDropdown($expiryYear, $cc_expiry_year);
                        ?>
                    </select>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <span class="required-field">*</span>
                    <label for="securityCode">Secuirty Code</label>
                    <input id="securityCode" type="password" placeholder="123" name="cc_code" maxlength="3" aria-label="Security Code">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-credit-card-2-front-fill credit-card-logo" viewBox="0 0 16 16">
                      <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                    </svg>
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <label class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" placeholder="416-123-4567" name="phone_number" aria-label="Phone number">
                  </div>
                    <div class="col-md-6 col-xs-12">
                        <span class="required-field">*</span>
                        <label for="charities" class="form-label">Select a Charity</label>
                        <select id="charities" class="form-select" name="charity">
                            <?php
                            $charities = ['Charities' => 'Charities','Sick Kids' => 'Sick Kids', 'Food Banks Canada' => 'Food Banks Canada', 'World Wide Fund for Nature (WWF)'=>'World Wide Fund for Nature (WWF)','Heart and Stroke Foundation' => 'Heart and Stroke Foundation'];
                            echo populateDropdown($charities, $charity);
                            ?>
                        </select>
                    </div>
                  <div class="col-md-6 col-xs-12">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="johndoe@gmail.com" name="email" aria-label="Email">
                  </div>
                </div>

                  </div>
                  <div class="col-12">
                      <button type="submit" class="btn form-submit" id="donation-btn-submit" name="addDonation">
                          Make Donation
                      </button>

                  </div>

                <h3>Accepted Payment Methods</h3>
                <ul id="payment-methods">
                  <li class="payment-card"><i class="fab fa-cc-visa"></i></li>
                  <li class="payment-card"><i class="fab fa-cc-mastercard"></i></li>
                  <li class="payment-card"><i class="fab fa-cc-amex"></i></li>
                </ul>

      </form>

        <?php
            if ($donations) {
        echo "<h1>Thanks for donating!</h1>";
    }
            ?>
    </div>

    <div <?php echo $adminBtn; ?>>
        <a class="btn btn-primary" href="Donations/list_donation.php" role="button">Admin List</a>
    </div>


  <footer><?php require_once "Views/footer.php"; ?></footer>

  </body>

</html>
