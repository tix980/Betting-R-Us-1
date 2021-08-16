<?php

ini_set('display_errors', 0);

function errorhandler($errno, $errmsg, $filename, $linenum, $context = null){

    $errortype = array(
        E_ERROR => "Error",
        E_WARNING => "warning",
        E_PARSE => "parse error",
        E_NOTICE => "Notice",
        E_USER_ERROR => "User Error",
        E_USER_WARNING => "User Warning",
        E_USER_NOTICE => "User Notice"

    );

    $dt = date('Y-m-d H:i:s');
    $err = "Error reporting\n";
    $err .= "\t Date Time: " . $dt . "\n";
    $err .= "\t Error Number: " . $errno . "\n";
    $err .= "\t Error Type: " . $errortype[$errno] . "\n";
    $err .= "\t Error Message: " . $errmsg . "\n";
    $err .= "\t file name: " . $filename . "\n";
    $err .= "\t Error line number: " . $linenum . "\n";
    $err .= "End reporting\n";

    error_log($err,3, dirname(__FILE__). './errorlogs/error_log.log');

    header("Location: customerror.php");


}

set_error_handler("errorhandler");