<?php
use BettingRUs\Models\Database;

require_once "Models/Database.php";
require_once "vendor/autoload.php";
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
    <?php require_once "header.php"; ?>

    <div class="container">
      <h1>Donations</h1>
      <p>Feeling generous? Make a donation!</p>

      <form class="donation-form">
        <div class="row">
          <div class="col-md-6 col-xs-12">
            <span class="required-field">*</span>
            <label class="form-label">Credit Card Number</label>
            <input type="text" class="form-control" placeholder="1111-2222-3333-4444" aria-label="Credit card number">
          </div>
          <div class="col-md-6 col-xs-12">
            <span class="required-field">*</span>
            <label class="form-label">Card Holder Name</label>
            <input type="text" class="form-control" placeholder="Joe Doe" aria-label="Card holder name">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-xs-12">
            <span class="required-field">*</span>
            <label for="expiryDate" class="form-label">Expiry Date</label>
            <select id="expiryDate" class="form-select">
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
            <select id="expriryYear" class="form-select">
              <option>YYYY</option>
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
            <input id="securityCode" type="text" placeholder="123" aria-label="Security Code">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-credit-card-2-front-fill credit-card-logo" viewBox="0 0 16 16">
              <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
            </svg>
          </div>

        </div>
        <div class="row">
          <div class="col-md-6 col-xs-12">
            <label class="form-label">Phone Number</label>
            <input type="tel" class="form-control" placeholder="416-123-4567" aria-label="Phone number">
          </div>
          <div class="col-md-6 col-xs-12">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="johndoe@gmail.com" aria-label="Email">
          </div>
        </div>


          <div class="row">
            <div class="col-md-6 col-xs-12">
              <span class="required-field">*</span>
              <label for="donation_amount" class="form-label">Donation Amount</label>
              <select id="donation_amount" class="form-select">
                <option selected>$5</option>
                <option>$10</option>
                <option>$20</option>
                <option>$50</option>
                <option>$100</option>
              </select>
            </div>
            <div class="col-md-6 col-xs-12">
              <span class="required-field">*</span>
              <label for="charities" class="form-label">Select a Charity</label>
              <select id="charities" class="form-select">
                <option selected>Charities</option>
                <option>Sick Kids</option>
                <option>Food Banks Canada</option>
                <option>World Wide Fund for Nature (WWF)</option>
                <option>Heart and Stroke Foundation</option>
              </select>
            </div>
          </div>
        <div class="col-12">
          <button type="submit" class="btn form-submit" id="donation-btn-submit">Make Donation</button>

        </div>

        <h3>Accepted Payment Methods</h3>
        <ul id="payment-methods">
          <li class="payment-card"><i class="fab fa-cc-visa"></i></li>
          <li class="payment-card"><i class="fab fa-cc-mastercard"></i></li>
          <li class="payment-card"><i class="fab fa-cc-amex"></i></li>
        </ul>

      </form>
    </div>


  <footer><?php require_once "footer.php"; ?></footer>

  </body>

</html>
