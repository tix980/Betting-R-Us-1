<?php
//INITIALIZE THE VARIABLES
$errors = "";
$firstname = "";
$lastname = "";
$email = "";
$contactNumber = "";
$enquiry = "";
$message = "";
//FUNCTION TO VALIDATE THE FORM
function validateContactForm($firstname,$lastname,$email, $contactNumber, $enquiry, $message, $errors)
{
    //IF FIRST NAME EMPTY, THROW AN ERROR
    if (empty($firstname)) {
        $errors .= "Please enter firstname<br/>";
    } else {

        $errors .= "";     }

//IF LAST NAME EMPTY, THROW AN ERROR
  if (empty($lastname)) {
    $errors .= "Please enter lastname<br/>";
} else {

    $errors .= "";
}

//IF EMAIL EMPTY OR NOT A VALID FORMAT, THROW AN ERROR
    if (empty($email)) {
        $errors .= "";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errors .= "Please enter valid email format<br/>";
        }
        $errors .= "";
    }
    //IF PHONE NUMBER EMPTY OF NOT ACCORDING TOT HE REQUIRED FORMAT, THROW AN ERROR
    if (empty($contactNumber)) {
        $errors .= "Please enter phone<br/>";
    } else {
        $pattern = "/^[1-9]\d{2}-\d{3}-\d{4}/";
        if (checkPattern($pattern, $contactNumber)) {
            $errors .= "Please enter valid Canadian phone number NNN-NNN-NNNN<br/>";
        }
    }
//IF ENQURY SELECTION ID EMPTY, THROW AN ERROR
    if (empty($enquiry ) ) {
        $errors .= "Please select a contact via the list<br/>";
    }
    //IF MESSAGE TEXT BOX IS EMPTY, THROW AN ERROR
    if (empty($message)) {
        $errors .= "Please enter a comments<br/>";
    }
    return $errors;
}

//function to validate with regular expression
function checkPattern($pattern, $value){
    return !preg_match($pattern, $value);
}
