<?php
require '../require/conn.php';

$query = 'SELECT 
`tax`.`type` AS `tax`,
`tax_household`.`amount` AS `tax-amount`
FROM  
`tax_household`,
`tax`
WHERE 
`tax_household`.`fk_household_id` = '. $_GET['id'] .'
AND
`tax_household`.`fk_tax_id` = `tax`.`tax_id`';

$result = $mysqli -> query($query) -> fetch_all();

echo json_encode($result);

