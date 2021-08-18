<?php
require '../require/conn.php';

$query = 'SELECT 
`household`.`member_forname` AS `name`,
`household`.`member_surname` AS `surname`,
`location_name`.`name` AS `location`,
`location_type`.`type` AS `location-type`,
`household_member_type`.`type` AS `member-type`,
`household`.`notes`
FROM 
`household`,
`location_name`,
`location_type`,
`household_member_type`
WHERE 
`household`.`household_id` = 23
AND
`household`.`fk_household_member_type_id` = `household_member_type`.`household_member_type_id`
AND
`household`.`fk_location_name_id` = `location_name`.`location_name_id`
AND
`location_name`.`fk_location_type_id` = `location_type`.`location_type_id`';

$result = $mysqli -> query($query) -> fetch_all();

echo json_encode($result);


