<?php
require '../require/conn.php';

$query = 'SELECT 
`real_estate`.`type` AS `type`,
`real_estate_household`.`quantity` AS `quantity`,
`real_estate_household`.`rent_income` AS `income`,
`real_estate_household`.`location` AS `location`,
`real_estate_household`.`description` AS `description`
FROM 
`real_estate_household`,
`real_estate`
WHERE 
`real_estate_household`.`fk_household_id` = '. $_GET['id'] .'
AND
`real_estate_household`.`fk_real_estate_id` = `real_estate`.`real_estate_id`';

$result = $mysqli -> query($query) -> fetch_all(MYSQLI_ASSOC);

echo json_encode($result);