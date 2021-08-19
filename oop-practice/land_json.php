<?php
require '../require/conn.php';

$query = 'SELECT 
`land`.`type` AS `type`,
`land_household`.`area` AS `area`,
`land_household`.`income` AS `income`,
`land_household`.`payed_rent` AS `rent`,
`land_household`.`location` AS `location`,
`land_household`.`description` AS `description`
FROM 
`land_household`,
`land`
WHERE 
`land_household`.`fk_household_id` = '. $_GET['id'] .'
AND
`land_household`.`fk_land_id` = `land`.`land_id`';

$result = $mysqli -> query($query) -> fetch_all(MYSQLI_ASSOC);

echo json_encode($result);

