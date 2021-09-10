<?php

require '../require/conn.php';


$query_livestock = 'SELECT * FROM `livestock` ORDER BY `type`';

    $result_livestock = $mysqli -> query($query_livestock) -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($result_livestock);
    ?>