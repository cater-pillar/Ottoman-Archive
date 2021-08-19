<?php
require '../require/conn.php';

$query = 'SELECT 
`tax`.`type` AS `type`,
`tax_household`.`amount` AS `amount`
FROM  
`tax_household`,
`tax`
WHERE 
`tax_household`.`fk_household_id` = '. $_GET['id'] .'
AND
`tax_household`.`fk_tax_id` = `tax`.`tax_id`';

$result = $mysqli -> query($query) -> fetch_all(MYSQLI_ASSOC);

echo json_encode($result);

