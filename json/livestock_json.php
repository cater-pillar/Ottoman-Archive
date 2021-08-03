<?php

$mysqli = new mysqli('localhost', 'root', '', 'prikaz_nisha');

    if($mysqli -> connect_errno) {
        echo 'Failed to connect to MySQL' . $mysqli -> connect_error;
    };

$mysqli -> set_charset("utf8mb4");


$query_livestock = 'SELECT * FROM `livestock` ORDER BY `type`';

    $result_livestock = $mysqli -> query($query_livestock) -> fetch_all();

    echo json_encode($result_livestock);
    ?>