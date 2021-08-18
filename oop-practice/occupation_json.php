<?php
require '../require/conn.php';

$query = 'SELECT 
`occupation`.`name` AS `occupation`,
`occupation_household`.`income` AS `occupation-income`,
`occupation_household`.`type` AS `occupation-skill`
FROM 
`occupation_household`,
`occupation`
WHERE 
`occupation_household`.`fk_household_id` = 23
AND
`occupation_household`.`fk_occupation_id` = `occupation`.`occupation_id`';

$result = $mysqli -> query($query) -> fetch_all();

echo json_encode($result);