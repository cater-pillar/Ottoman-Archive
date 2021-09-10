<?php

require '../require/conn.php';


$query_taxes = 'SELECT * FROM `tax` ORDER BY `type`';

    $result_taxes = $mysqli -> query($query_taxes) -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($result_taxes);
    ?>