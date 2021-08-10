<?php
    session_start();
    //unset($_SESSION['userid']);
    $_SESSION = [];

    session_destroy();
    header("Location: index.php");
