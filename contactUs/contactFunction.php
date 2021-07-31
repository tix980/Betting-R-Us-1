<?php
function populateDropdown($options, $select = ""){
    $html_dropdown = "";
    foreach ($options as $code => $name) {
        $selected = $select == $code ? "selected" : "";
        $html_dropdown .= "<option $selected value='$code'>$name</option>";
    }

    return $html_dropdown;
}