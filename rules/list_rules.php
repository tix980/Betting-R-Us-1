<?php
use BettingRUs\Models\Database;
use BettingRUs\Models\Rule;

require_once "../Models/Database.php";
require_once "../vendor/autoload.php";
$db = Database::getDb();
$r = new Rule();
$rules = $r->getAllRules(Database::getDb());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/rules.css">
    <title>Rules</title>
</head>
<body>
<div class="container-fluid">
    <main>
            <h2>Rules and Regulations</h2>
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Rule</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($rules as $rule) { ?>
                <tr>
                    <td><?= $rule['id']?></td>
                    <td><?= $rule['rule']; ?></td>
                    <td><form action="./update_rule.php" method="post">
                        <input type="hidden" name="id" value="<?= $rule['id']; ?>"/>
                        <input type="submit" class="button btn btn-primary" name="updateRule" value="Update"/>
                    </form></td>
                    <td><form action="./delete_rule.php" method="post">
                        <input type="hidden" name="id" value="<?= $rule['id']; ?>"/>
                        <input type="submit" class="button btn btn-danger" name="deleteRule" value="Delete"/>
                    </form></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            <div>
                <a href="add_rule.php" class="btn btn-primary">Add a Rule</a>
            </div>
    </main>

</div><!-- container -->

<script src="../js/jquery.min.js"></script>
<!--<script src="js/popper.min.js"></script>-->
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
