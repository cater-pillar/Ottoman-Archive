<?php

require '../require/conn.php';


$query_occupation = 'SELECT 
                            A.*
                            FROM
                            `occupation` AS A
                            INNER JOIN `occupation` AS B
                                ON A.fk_occupation_id = B.occupation_id
                            ORDER BY A.`name`';

    $result_occupation = $mysqli -> query($query_occupation) -> fetch_all(MYSQLI_ASSOC);

    echo json_encode($result_occupation);


   /* 'SELECT 
                            A.*
                            FROM
                            `occupation` AS A
                            INNER JOIN `occupation` AS B
                                ON A.fk_occupation_id = B.occupation_id
                            INNER JOIN `occupation` AS C
                                ON B.fk_occupation_id = C.occupation_id
                            ORDER BY A.`name`' */
    ?>