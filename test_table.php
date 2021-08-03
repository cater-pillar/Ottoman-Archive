<?php

require ('require/conn.php');


$occupations = 'SELECT * 
                FROM `occupation` 
                ORDER BY 
                `occupation`.`fk_occupation_id`, 
                `occupation`.`name`';

$occ_results = $mysqli -> query($occupations) -> fetch_all();

$locations = 'SELECT 
                location_name_id,
                `name`
                FROM `location_name` 
                ORDER BY  
                `name`';

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

var_dump($a);

?>