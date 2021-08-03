<?php

require ('require/conn.php');


$occupations = 'SELECT * 
                FROM `occupation` 
                ORDER BY 
                `occupation`.`fk_occupation_id`, 
                `occupation`.`name`';

$occ_results = $mysqli -> query($occupations) -> fetch_all();

$locations =    'SELECT * 
                FROM `location_name` 
                ORDER BY 
                `location_name`.`location_name_id`';

$loc_results = $mysqli -> query($locations) -> fetch_all();

$a = [];

foreach($loc_results as $loc_result) {
  
    foreach($occ_results as $occ_result) {

    $query = "SELECT
                occupation.`name`,
                COUNT(occupation_household.fk_occupation_id),
                SUM(occupation_household.income)
            FROM
                occupation_household,
                occupation,
                household,
                location_name
            WHERE
                occupation_household.fk_occupation_id = occupation.occupation_id
            AND
                occupation.occupation_id = " .$occ_result[0]. "
            AND
                occupation_household.fk_household_id = household.household_id
            AND
                household.fk_location_name_id = location_name.location_name_id
            AND
                location_name.location_name_id = " . $loc_result[0];

    $occ = $mysqli -> query($query) -> fetch_all();

    
    if($occ[0][1] > 0) { 
        array_push($occ[0], $loc_result[0]);
        array_push($occ[0], $loc_result[1]);
        array_push($a, $occ[0]);
    
    };


};
};
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Prikaz baze podataka</title>
        <?php require 'require/head.php';?>
    </head>
    <body>
        <?php require ('require/nav.php'); ?>
        <div class="container alert alert-primary">
            <?php foreach ($loc_results as $loc_result): ?>
            <h1>Occupations in <?php echo $loc_result[1] ?></h1>
            <table class="table table-striped">
                <tr>
                <th>Occupation
                <th>Number of people
                <th>Total income
                <?php foreach ($a as $b): ?>
                    <?php if ($b[3] == $loc_result[0]): ?>
                <tr>
                <td><?php echo $b[0] ?>
                <td><?php echo $b[1] ?>
                <td><?php echo $b[2] ?>
                    <?php endif; ?>
                <?php endforeach; ?>
                <tr>
                <th> TOTAL
                <th><?php $r = 0; foreach ($a as $b) {
                                    if ($b[3] == $loc_result[0]) {
                                            $r += $b[1];
                                            }; 
                                        }; 
                                    echo $r; ?>
                <th><?php $e = 0; foreach ($a as $b) {
                                    if ($b[3] == $loc_result[0]) {
                                            $e += $b[2]; 
                                            };
                                        }; 
                                    echo $e; ?>
            </table>
            <?php endforeach; ?>
        </div>
    </body>
</html>