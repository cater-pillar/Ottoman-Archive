<?php
$mysqli = new mysqli('localhost', 'root', '', 'prikaz_nisha');

if($mysqli -> connect_errno) {
    echo 'Failed to connect to MySQL' . $mysqli -> connect_error;
};

$mysqli -> set_charset("utf8mb4");