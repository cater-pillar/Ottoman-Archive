<?php
require '../require/conn.php';

$query = 'SELECT 
`livestock`.`type` AS `type`,
`livestock_household`.`quantity` AS `quantity`,
`livestock_household`.`income` AS `income`
FROM 
`livestock_household`,
`livestock`
WHERE 
`livestock_household`.`fk_household_id` = '. $_GET['id'] .'
AND
`livestock_household`.`fk_livestock_id` = `livestock`.`livestock_id`';

$result = $mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
echo json_encode($result);