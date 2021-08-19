<?php
require '../require/conn.php';

$query = 'SELECT 
`occupation`.`name` AS `type`,
`occupation_household`.`income` AS `income`,
`occupation_household`.`type` AS `skill`
FROM 
`occupation_household`,
`occupation`
WHERE 
`occupation_household`.`fk_household_id` = '. $_GET['id'] .'
AND
`occupation_household`.`fk_occupation_id` = `occupation`.`occupation_id`';

$result = $mysqli -> query($query) -> fetch_all(MYSQLI_ASSOC);

echo json_encode($result);