<?php

require '../require/conn.php';


$query_land = 'SELECT * FROM `land` ORDER BY `type`';

    $result_land = $mysqli -> query($query_land) -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($result_land);
    ?>