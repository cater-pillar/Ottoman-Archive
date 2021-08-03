<?php

// Function to facilitate the creation of prepared statements with no variables

function prepare_query($query, $conn) {
    $prep = $conn -> prepare($query); 
    $prep -> execute();
    $result = $prep -> get_result();
    return $user = $result -> fetch_all();};

?>