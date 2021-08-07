<?php
    unset($_SESSION['username']);
    $_SESSION = [];

    session_destory();
    header("Location: index.php");
