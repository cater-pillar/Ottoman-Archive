<?php
require '../require/conn.php';

$query = 'SELECT 
`land`.`type` AS `land`,
`land_household`.`area` AS `land-area`,
`land_household`.`income` AS `land-income`,
`land_household`.`payed_rent` AS `land-rent`,
`land_household`.`location` AS `land-location`,
`land_household`.`description` AS `land-description`
FROM 
`land_household`,
`land`
WHERE 
`land_household`.`fk_household_id` = 23
AND
`land_household`.`fk_land_id` = `land`.`land_id`';

$result = $mysqli -> query($query) -> fetch_all();

echo json_encode($result);

