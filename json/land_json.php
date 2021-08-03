<?php

$mysqli = new mysqli('localhost', 'root', '', 'prikaz_nisha');

    if($mysqli -> connect_errno) {
        echo 'Failed to connect to MySQL' . $mysqli -> connect_error;
    };

$mysqli -> set_charset("utf8mb4");


$query_land = 'SELECT * FROM `land` ORDER BY `type`';

    $result_land = $mysqli -> query($query_land) -> fetch_all();

    echo json_encode($result_land);
    ?>