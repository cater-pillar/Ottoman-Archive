<?php
require '../require/conn.php';

$query = 'SELECT 
`livestock`.`type` AS `livestock`,
`livestock_household`.`quantity` AS `livestock-quantity`,
`livestock_household`.`income` AS `livestock-income`
FROM 
`livestock_household`,
`livestock`
WHERE 
`livestock_household`.`fk_household_id` = 23
AND
`livestock_household`.`fk_livestock_id` = `livestock`.`livestock_id`';

$result = $mysqli -> query($query) -> fetch_all();

echo json_encode($result);