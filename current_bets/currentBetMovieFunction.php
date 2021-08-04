<?php
function populateDropdown($movies, $select = ""){
    $html_dropdown = "";
    foreach ($movies as $movie) {
        $selected = $select == $movie->id ? "selected" : "";
        $html_dropdown .= "<option $selected value='$movie->id'>$movie->title</option>";
    }

    return $html_dropdown;
}