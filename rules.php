<?php
use BettingRUs\Models\Database;

require_once "Models/Database.php";
require_once "vendor/autoload.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Rules</title>
</head>
<body>
<div class="container-fluid">
    <?php
    require 'header.php';
    ?>
    <main>
            <h2>Rules and Regulations</h2>
            <ol>
                <li>These Betting Rules are inseparably linked to our Terms & Conditions, of which they form a
                    part, and acceptance of these Betting Rules is a prerequisite to account registration. Any
                    capitalized terms used here in which are not defined shall take their meaning from the Terms
                    & Conditions.<a href="rules/update_rules.php">Update</a> <a href="rules/delete_rule.php">Delete</a>
                </li>
                <li>The minimum amount for a bet is 100 tokens. Your maximum amount for a bet differs between
                    events, type of user and bets. You will see the exact value specified in the field where you enter
                    the stake amount, when placing a bet. We make no guarantee that any bet placed within or
                    for the maximum stake shall be accepted.<a href="rules/update_rules.php">Update</a>
                    <a href="rules/delete_rule.php">Delete</a>
                </li>
                <li>
                    Bets R Us reserves the right to refuse/cancel any bet or part of a bet before the bet ends
                    and to make ambiguous bets void, without providing any justification.<a href="rules/update_rules.php">Update</a>
                    <a href="rules/delete_rule.php">Delete</a>
                </li>
                <li>
                    Customers cannot cancel or change a bet once the bet has been placed and confirmed.
                    <a href="rules/update_rules.php">Update</a>
                    <a href="rules/delete_rule.php">Delete</a>
                </li>
                <li>
                    When an event is cancelled, all related bets will be void automatically and accounts
                    refunded.<a href="rules/update_rules.php">Update</a>
                    <a href="rules/delete_rule.php">Delete</a>
                </li>
                <li>
                    Bets R Us reserves the right to void any bet that may have been accepted when the account
                    did not have sufficient funds to cover the bet. If an account has insufficient funds as a result
                    of a deposit that has been cancelled by the payment processing party, Bets R Us reserves the
                    right to cancel any bet that may have been accepted retroactively
                    <a href="rules/update_rules.php">Update</a>
                    <a href="rules/delete_rule.php">Delete</a>
                </li>
                <li>
                    Bets R Us allows only one account per person. Any subsequent accounts opened under
                    the same postcode/personal details/IP address that are found to be related to any
                    existing account may be closed immediately and any bets will be voided at Bets R Us 's
                    discretion. Bets R Us reserves the right to reclaim any winnings attained by these
                    means and we reserve the right to withhold all or part of your balance and/or recover
                    from your account deposits, pay outs, bonuses, any winnings that are attained by
                    these means.<a href="rules/update_rules.php">Update</a>
                    <a href="rules/delete_rule.php">Delete</a>
                </li>
            </ol>
            <div>
                <a href="rules/add_rules.php" class="btn btn-primary">Add a Rule</a>
            </div>
    </main>

    <?php
    require 'footer.php';
    ?>
</div><!-- container -->

<script src="js/jquery.min.js"></script>
<!--<script src="js/popper.min.js"></script>-->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
