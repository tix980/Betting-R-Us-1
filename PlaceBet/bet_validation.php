<?php
//INITIALIZE THE VARIABLES
$errors = "";
$amount = "";

//FUNCTION TO VALIDATE THE FORM
function validateBetForm($amount, $errors)
{
    //IF amount is EMPTY, THROW AN ERROR
    if (empty($amount)) {
        $errors .= "Please enter the amount";
    } else {
        $pattern = "/\d{10}/";
        if (checkPattern($pattern, $amount)) {
            $errors .= "Please enter a valid amount";
        }
    }

}

//function to validate with regular expression
function checkPattern($pattern, $value){
    return !preg_match($pattern, $value);
}

