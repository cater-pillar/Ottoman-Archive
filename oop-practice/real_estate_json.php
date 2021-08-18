<?php
require '../require/conn.php';

$query = 'SELECT 
`real_estate`.`type` AS `real-estate`,
`real_estate_household`.`quantity` AS `real-estate-quantity`,
`real_estate_household`.`rent_income` AS `real-estate-income`,
`real_estate_household`.`location` AS `real-estate-location`,
`real_estate_household`.`description` AS `real-estate-description`
FROM 
`real_estate_household`,
`real_estate`
WHERE 
`real_estate_household`.`fk_household_id` = 23
AND
`real_estate_household`.`fk_real_estate_id` = `real_estate`.`real_estate_id`';

$result = $mysqli -> query($query) -> fetch_all();

echo json_encode($result);