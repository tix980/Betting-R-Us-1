<?php
use BettingRUs\Models\{Database, Currency};

require_once "vendor/autoload.php";

$userID = $_SESSION['userid'];
$username = $_SESSION['username'];
$userType = $_SESSION['accounttype'];
$userFullName = $_SESSION['userrealname'];

$money=$targetToken=$token=$targetMoney='';

$c = new Currency();
$db = Database::getDb();

$id=$userID;

$wallet = $c->selectedWallet($id,$db);

$token = $wallet->token;
$cad = $wallet->canadian_dollars;

if(isset($_POST['convert'])){
		$money = (int)$cad - (int)$_POST['target_token'] ;
		$targetToken = (int)$token + (int)$_POST['target_token'];
		var_dump($targetToken);

		$count = $c->updateWallet($id,$money,$targetToken,$db);
		if($count){
			echo "Token :" .$token . ' , ' . "CAD :" . $cad ;
		}else{
			echo "something is wrong!";
		}

		$token = (int)$token - (int)$_POST['target_money'] ;
		$targetMoney = (int)$cad + (int)$_POST['target_money'];

		$count = $c->updateWalletReverse($id,$targetMoney,$token ,$db);
		if($count){
			echo "Token :" .$token . ' , ' . "CAD :" . $cad ;
		}else{
			echo "something is wrong!";
		}

}
?>
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
			<?php require_once "Views/header.php"; ?>
		</header>
    <main>
      <div class="page-container">
        <form action="#" method="POST" class="form-group" id="currency-converter-form" name="currency-converter-form" >
					<input type="hidden" name="id" value="<?= $id; ?>" />
					<p>CAD : <?php echo $cad; ?> </p><p>Token: <?php echo $token; ?></p>
					<h1>Currency Converter</h1>
          <div id="money">
            <img src="images/cad.png" id="cad" alt="canada currency">
						<div class="flex-container">
							<div>CAD</div>
							<div id="selected-cad"><?php echo $cad; ?></div>
						</div>
          </div>
          <div id="token-info-2" style="display: none;">
            <div id="coin2"></div>
						<div class="flex-container2">
							<div>Token</div>
							<div id="selected-cad"><?php echo $token; ?></div>
						</div>
          </div>
          <button type="button" id="exchange"><i class="fas fa-exchange-alt"></i></button>
          <div id="token-info">
            <div id="coin"></div>
            <label for="token">Token</label>
            <input type="text" id="token" name="target_token" value="">
          </div>
          <div id="money-2" style="display: none;">
            <img src="images/cad.png" id="cad" alt="canada currency">
            <label for="real-money">CAD</label>
            <input type="text" id="real-money" name="target_money" value="">
          </div>
          <button type="submit" id="btn" name="convert">Convert!!</button>
        </form>
      </div>
    </main>
		<footer><?php require_once "Views/footer.php"; ?></footer>
  </body>
</html>