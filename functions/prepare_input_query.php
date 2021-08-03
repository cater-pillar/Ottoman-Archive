<?php

// Function to facilitate the creation of prepared statements with an ID variable

function prepare_input_query($query, $conn, $id) {
    $prep = $conn -> prepare($query);
    $prep -> bind_param('i', $id);
    $prep -> execute();
    $result = $prep -> get_result();
    return $user = $result -> fetch_all();};

?>