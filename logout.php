<?php
    session_start();
    unset($_SESSION['username']);
    $_SESSION = [];
    header("Location: index.php");
    session_destory();