<?php

$mysqli = new mysqli('localhost', 'root', '', 'prikaz_nisha');

    if($mysqli -> connect_errno) {
        echo 'Failed to connect to MySQL' . $mysqli -> connect_error;
    };

$mysqli -> set_charset("utf8mb4");


$query_taxes = 'SELECT * FROM `tax` ORDER BY `type`';

    $result_taxes = $mysqli -> query($query_taxes) -> fetch_all();

    echo json_encode($result_taxes);
    ?>