<?php

require '../require/conn.php';


$query_real_estate = 'SELECT * FROM `real_estate` ORDER BY `type`';

    $result_real_estate = $mysqli -> query($query_real_estate) -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($result_real_estate);
    ?>