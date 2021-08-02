<?php
function populateDropdown($enquiry, $select = ""){
    $html_dropdown = "";
    foreach ($enquiry as $enquiryType) {
        $selected = $select == $enquiryType->id ? "selected" : "";
        $html_dropdown .= "<option $selected value='$enquiryType->id'>$enquiryType->enquiry_type</option>";
    }

    return $html_dropdown;
}
