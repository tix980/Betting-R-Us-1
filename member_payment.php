
<?php
session_start();
use BettingRUs\Models\{Database, Currency,User};

require_once "vendor/autoload.php";
if(isset($_POST['makepayment'])){
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
    if($_POST['membership'] === 'No') {
        header('location:index.php');
    }
    $id = $_SESSION['userid'];
    $wallet=$newwallet=$updateuser="";
    $cad=$token=0;
    $c = new Currency();
    $db = Database::getDb();

    $wallet = $c->selectedWallet($id,$db);
    $cad = ($wallet->canadian_dollars)-100;
    if($cad < 0){
        header('location:payment.php');
    }else{
        $token = ($wallet->token) + 10;
        $newwallet = $c->updateWallet($id, $cad,$token, $db);
        $u = new User();
        $member = 1;
        $updateuser = $u->updateMembership( $id, $member, $db);
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/members.css">
    <title>Membership Card</title>
</head>
<body>
<div class="container-fluid">
    <?php
    require_once './Views/header.php';
    ?>
    <div class="message-member">
        <p>Thank you <?php echo $_SESSION['userrealname'] ?> !</p>
        <p>You are now our valuable Member!</p>
        <p>Your remaining balance in the wallet is <?php echo ($cad - 100) ?></p>
        <p>Your remaining token in the wallet is <?php echo ($token + 10) ?></p>
    <form action="preview_membership.php" method="post">
        <input class="previewbtn" type="submit" name="preview" value="Preview"/>
    </form>
    </div>
<?php
require_once './Views/footer.php';
?>
</div>
</body>
</html>
