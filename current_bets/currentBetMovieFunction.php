<?php
function populateDropdownMovie($movies, $select = ""){
    $html_dropdown = "";
    foreach ($movies as $movie) {
        $selected = $select == $movie->id ? "selected" : "";
        $html_dropdown .= "<option $selected value='$movie->id'>$movie->title</option>";
    }

    return $html_dropdown;
}

function populateDropdownActor($actors, $select = ""){
    $html_dropdown = "";
    foreach ($actors as $actor) {
        $selected = $select == $actor->id ? "selected" : "";
        $html_dropdown .= "<option $selected value='$actor->id'>$actor->actor_fname   $actor->actor_lname </option>";
    }

    return $html_dropdown;
}