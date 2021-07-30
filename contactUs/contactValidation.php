<?php



function validateContactForm($firstname,$lastname,$email, $contactNumber, $enquiry, $message)
{
    if (empty($firstname)) {
        $errors .= "Please enter firstname<br/>";
    } else {

        $errors .= "";     }


  if (empty($lastname)) {
    $errors .= "Please enter lastname<br/>";
} else {

    $errors .= "Please enter valid email format<br/>";
}


    if (empty($email)) {
        $errors .= "Please enter email<br/>";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors .= "Please enter valid email format<br/>";
        }
    }


    if (empty($contactNumber)) {
        $errors .= "Please enter phone<br/>";
    } else {
        $pattern = "/^[1-9]\d{2}-\d{3}-\d{4}/";
        if (checkPattern($pattern, $contactNumber)) {
            $errors .= "Please enter valid phone number<br/>";
        }
    }

    if (empty($enquiry ) ) {
        $errors .= "Please select a contact via the list<br/>";
    }



    if (empty($message)) {
        $errors .= "Please enter a comments<br/>";
    }

    return $errors;
}

//function to validate with regular expression
function checkPattern($pattern, $value){
    return !preg_match($pattern, $value);
}
