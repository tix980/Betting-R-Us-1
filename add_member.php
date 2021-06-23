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
    <title>Add Member</title>
</head>
<body>
<div class="container-fluid">
    <?php
    require_once 'header.php';
    ?>
    <h1>Register As a Member</h1>
    <div class="add-membercontainer">
    <div class="add-member-form">
    <!--    Form to Add  member -->
    <form action="" method="post">

        <div class="formgroup">
            <label class="label" for="name">Name :</label>
            <input type="text" name="name" id="name" value="" class="formcontrol"
                   placeholder="Enter name">
            <span style="color: red">
            </span>
        </div>
        <div class="formgroup">
            <label class="label" for="age">Age :</label>
            <input type="text" name="age" id="age" value="" class="formcontrol"
                   placeholder="Enter your age">
            <span style="color: red">
            </span>
        </div>
        <div class="formgroup">
            <label class="label" for="email">Email :</label>
            <input type="email"  id="email" name="email" class="formcontrol"
                   value="" placeholder="Enter email">
            <span style="color: red">

            </span>
        </div>
        <div class="formgroup">
            <label class="label" for="username">UserName :</label>
            <input type="text"  id="username" name="username" class="formcontrol"
                   value="" placeholder="Enter username">
            <span style="color: red">

            </span>
        </div>
        <div class="formgroup">
            <label class="label" for="password">Password :</label>
            <input type="password"  id="password" name="password" class="formcontrol"
                   value="" placeholder="Enter password">
            <span style="color: red">

            </span>
        </div>
        <div class="formgroup">
            <label class="label" for="address">Address :</label>
            <textarea name="address" value="" class="formcontrol"
                      id="address" placeholder="Enter your address"></textarea>
            <span style="color: red">

            </span>
        </div>
        <a href="./Membership/list_members.php" id="btn_back" class="btn btn-success float-left">Back</a>
        <button type="submit" name="addMember"
                id="btn-submit" class="btn btn-primary float-right">
            Register
        </button>
    </form>
    </div>
        <section class="membershipcard">
            <img src="images/membership-card.png" alt="image of a membership card" width="400" height="212"/>
            <h4>Membership Benefits</h4>
            <p>Unlimited  Betting</p>
            <p>More Events</p>
        </section>
    </div>
    <?php
    require_once 'footer.php';
    ?>
</div><!-- container -->

<script src="./js/jquery.min.js"></script>
<!--<script src="js/popper.min.js"></script>-->
<script src="./js/bootstrap.min.js"></script>
</body>
</html>
