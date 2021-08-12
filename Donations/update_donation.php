<?php
use BettingRUs\Models\{Database, Donation};
require_once "../vendor/autoload.php";
require_once "../Models/Database.php";
require_once "../Models/Donation.php";

$donation_amount = '';
$cc_number = '';
$cc_name = '';
$cc_code = '';
$cc_expiry_month = '';
$cc_expiry_year = '';
$email = '';
$phone_number = '';
$charity = '';

if(isset($_POST['updateDonation'])){
    $id = $_POST['id'];
    $db = Database::getDb();

    $d = new Donation();
    $donation = $d->getDonationWithId($id, $db);

    $donation_amount = $donation->donation_amount;
    $cc_number = $donation->cc_number;
    $cc_name = $donation->cc_name;
    $cc_code = $donation->cc_code;
    $cc_expiry_month = $donation->cc_expiry_month;
    $cc_expiry_year = $donation->cc_expiry_year;
    $email = $donation->email;
    $phone_number = $donation->phone_number;
    $charity = $donation->charity;
}

if(isset($_POST['updDonation'])){
    $donation_amount = $_POST['donation_amount'];
    echo $donation_amount;
    $cc_number = $_POST['cc_number'];
    echo $cc_number;
    $cc_name = $_POST['cc_name'];
    echo $cc_name;
    $cc_code = $_POST['cc_code'];
    $cc_expiry_month = $_POST['cc_expiry_month'];
    echo $cc_expiry_month;
    $cc_expiry_year = $_POST['cc_expiry_year'];
    echo $cc_expiry_year;
    $email = $_POST['email'];
    $charity = $_POST['charity'];
    echo $charity;
    $id = $_POST['id'];
    echo $id;

    $db = Database::getDb();
    var_dump($db);
    $d = new Donation();

    var_dump($d);
    echo $id;
    $donation = $d->updateDonation($id, $donation_amount, $cc_number, $cc_name, $cc_code, $cc_expiry_month, $cc_expiry_year, $email, $charity, $charity, $db);
    var_dump($donation);
    echo($d->updateDonation($id, $donation_amount, $cc_number, $cc_name, $cc_code, $cc_expiry_month, $cc_expiry_year, $email, $charity, $charity, $db));


    if($donation){
        header("Location: list_donation.php");
    } else {
        echo "problem adding donation";
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
        <link rel="stylesheet" href="../css/donations.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <title>Update Donation</title>
    </head>
    <body>
    <div class="container">
        <h1>Update Donation</h1>
        <?php echo "<p> test" . $cc_number . "</p>" ?>
        <form class="donation-form" method="post">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <span class="required-field">*</span>
                    <label class="form-label">Credit Card Number</label>
                    <input type="text" class="form-control" name="cc_number" value="<?= $cc_number ?>" placeholder="1111-2222-3333-4444" aria-label="Credit card number">
                </div>
                <div class="col-md-6 col-xs-12">
                    <span class="required-field">*</span>
                    <label class="form-label">Card Holder Name</label>
                    <input type="text" class="form-control" name="cc_name" value="<?= $cc_name ?>" placeholder="Joe Doe" aria-label="Card holder name">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <span class="required-field">*</span>
                    <label for="donation_amount" class="form-label">Donation Amount</label>
                    <select id="donation_amount" class="form-select" name="donation_amount" value="<?= $donation_amount ?>">
                        <option>$5</option>
                        <option>$10</option>
                        <option>$20</option>
                        <option>$50</option>
                        <option>$100</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <span class="required-field">*</span>
                        <label for="expiryDate" class="form-label">Expiry Date</label>
                        <select id="expiryDate" class="form-select" name="cc_expiry_month">
                            <option selected>MM</option>
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                            <option>05</option>
                            <option>06</option>
                            <option>07</option>
                            <option>08</option>
                            <option>09</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                        </select>
                        <select id="expiryYear" class="form-select" name="cc_expiry_year">
                            <option selected>YYYY</option>
                            <option>2021</option>
                            <option>2022</option>
                            <option>2023</option>
                            <option>2024</option>
                            <option>2025</option>
                            <option>2026</option>
                            <option>2027</option>
                            <option>2028</option>
                            <option>2029</option>
                            <option>2030</option>
                        </select>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <span class="required-field">*</span>
                        <label for="securityCode">Secuirty Code</label>
                        <input id="securityCode" type="password" placeholder="123" name="cc_code" value="<?= $cc_code ?>" maxlength="3" aria-label="Security Code">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-credit-card-2-front-fill credit-card-logo" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                        </svg>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" placeholder="416-123-4567" name="phone_number" value="<?= $phone_number ?>" aria-label="Phone number">
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <span class="required-field">*</span>
                        <label for="charities" class="form-label">Select a Charity</label>
                        <select id="charities" class="form-select" name="charity">
                            <option selected>Charities</option>
                            <option>Sick Kids</option>
                            <option>Food Banks Canada</option>
                            <option>World Wide Fund for Nature (WWF)</option>
                            <option>Heart and Stroke Foundation</option>
                        </select>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="johndoe@gmail.com" name="email" value="<?= $email ?>" aria-label="Email">
                    </div>
                </div>

            </div>
            <div class="col-12">
                <button type="submit" class="btn form-submit" id="donation-btn-submit" name="updDonation">
                    Update Donation
                </button>

            </div>
        </form>
    </div>

    </body>
</html>