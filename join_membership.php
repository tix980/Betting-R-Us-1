<?php
	use BettingRUs\Models\{ Database, User};
	 require_once "./vendor/autoload.php";
     require_once './Views/header.php';
	if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
	$id = $_SESSION['userid'];
	$db = $db = Database::getDb();
	$u = new User();
	$user = $u->getUserID( $id, $db);
	$membership = $user->membership;
	echo $membership;
	if($membership === '1'){

	    require_once "membercard.php";
	}else{?>

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
    <title>Join Membership</title>
</head>
<body>
<div class="container-fluid">

        <div class="container-fluid">
            <div class="membercontainer">
            <div class="benefits">
                <h2 class="mheading">Membership Benefits</h2>
                <ol>
                    <li>You get to have a bonus of 10 tokens.</li>
                    <li>Get plenty of gifts </li>
                    <li>No limits in betting!</li>
                </ol>
            </div>
            <div class="steps">
                <h2 class="mheading">To Become a Member</h2>
                <ol>
                    <li>The membership is for 1 year </li>
                    <li>You have to renew it after a year if you want to continue being a member </li>
                    <li>You pay a fees of 100 CAD to become a member</li>
                </ol>
            </div>
            </div>
            <p class="memberpara">Do you want to become a member?</p>
            <div class="previewform">
            <form action="member_payment.php" method="post">
                <input type="radio" id="yes" name="membership" value="Yes">
                <label for="yes">Yes</label>
                <input type="radio" id="no" name="membership" value="No">
                <label for="no">No</label>
                <div >
                <input class="previewbtn" type="submit" name="makepayment" value="MakePayment"/>
                </div>
            </form>
            </div>

        </div>

    <!--</div>-->
    <?php
    require_once './Views/footer.php';
    ?>
</div><!-- container -->

<script src="./js/jquery.min.js"></script>
<!--<script src="js/popper.min.js"></script>-->
<script src="./js/bootstrap.min.js"></script>
</body>
</html>
<?php
    }
	?>
