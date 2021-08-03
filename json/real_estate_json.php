<?php

$mysqli = new mysqli('localhost', 'root', '', 'prikaz_nisha');

    if($mysqli -> connect_errno) {
        echo 'Failed to connect to MySQL' . $mysqli -> connect_error;
    };

$mysqli -> set_charset("utf8mb4");


$query_real_estate = 'SELECT * FROM `real_estate` ORDER BY `type`';

    $result_real_estate = $mysqli -> query($query_real_estate) -> fetch_all();

    echo json_encode($result_real_estate);
    ?>