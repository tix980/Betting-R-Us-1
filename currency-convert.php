<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Currency Converter</title>
    <link rel="stylesheet" type="text/css" href="css/currency-converter.css">
		<link href="css/main.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="js/currency-convert.js"></script>
    <script src="https://kit.fontawesome.com/c277f8812a.js" crossorigin="anonymous"></script>
  </head>
  <body>
		<header>
			<?php require_once "header.php"; ?>
		</header>
    <main>
      <div class="page-container">
        <form action="#" method="POST" class="form-group" id="currency-converter-form" name="currency-converter-form" >
          <h1>Currency Converter</h1>
          <div id="money">
            <img src="images/cad.png" id="cad" alt="canada currency">
            <label for="real-money">CAD</label>
            <input type="text" id="real-money" name="real_money">
          </div>
          <div id="token-info-2" style="display: none;">
            <div id="coin"></div>
            <label for="token">Token</label>
            <input type="text" id="token" name="token">
          </div>
          <button type="button" id="exchange"><i class="fas fa-exchange-alt"></i></button>
          <div id="token-info">
            <div id="coin"></div>
            <label for="token">Token</label>
            <input type="text" id="token" name="token">
          </div>
          <div id="money-2" style="display: none;">
            <img src="images/cad.png" id="cad" alt="canada currency">
            <label for="real-money">CAD</label>
            <input type="text" id="real-money" name="real_money">
          </div>
          <button type="button" id="btn">Convert!!</button>
        </form>
      </div>
    </main>
		<footer><?php require_once "footer.php"; ?></footer>
  </body>
</html>