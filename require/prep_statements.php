<?php

require 'functions/prepare_input_query.php';

$new_household = 'SELECT 
        location_name.`name`, 
        household.`household_id`, 
        household.`household_number`, 
        household.`member_forname`, 
        household.`member_surname`, 
        household_member_type.`type`,
        household_member_type.`type_en`,
        household.`notes`
    FROM 
        location_name, 
        household, 
        household_member_type 
    WHERE 
        household.household_id = ? 
    AND 
        household.fk_location_name_id = 
        location_name.location_name_id 
    AND 
        household.fk_household_member_type_id = 
        household_member_type.household_member_type_id';

$result_new_household = prepare_input_query($new_household, $mysqli, $id);


$new_land = 'SELECT 
        land.`type`,
        land.`type_en`, 
        land_household.area, 
        land_household.income,
        land_household.payed_rent, 
        land_household.location, 
        land_household.description  
    FROM 
        land_household, 
        land 
    WHERE 
        land_household.fk_household_id = ? 
    AND 
        land.land_id = land_household.fk_land_id
    ORDER BY
        land.`type`';

$result_new_land = prepare_input_query($new_land, $mysqli, $id);

$new_tax = 'SELECT 
        tax.`type`,
        tax.`type_en`,
        tax_household.amount, 
        tax_household.is_exused  
    FROM 
        tax_household, 
        tax 
    WHERE 
        tax_household.fk_household_id = ? 
    AND 
        tax.tax_id = tax_household.fk_tax_id
    ORDER BY
        tax.`type`';

$result_new_tax = prepare_input_query($new_tax, $mysqli, $id);



$new_real_estate = 'SELECT 
        real_estate.`type`,
        real_estate.`type_en`,
        real_estate_household.quantity,
        real_estate_household.rent_income,
        real_estate_household.location, 
        real_estate_household.description  
    FROM 
        real_estate_household, 
        real_estate 
    WHERE 
        real_estate_household.fk_household_id = ? 
    AND 
        real_estate.real_estate_id = 
        real_estate_household.fk_real_estate_id
    ORDER BY
        real_estate.`type`';

$result_new_real_estate = prepare_input_query($new_real_estate, $mysqli, $id);

$new_occupation = 'SELECT 
        occupation.`name`, 
        occupation.`name_en`,
        occupation_household.income, 
        occupation_household.`type`  
    FROM 
        occupation_household, 
        occupation 
    WHERE 
        occupation_household.fk_household_id = ? 
    AND 
        occupation.occupation_id = 
        occupation_household.fk_occupation_id
    ORDER BY
        occupation.`name`';

$result_new_occupation = prepare_input_query($new_occupation, $mysqli, $id);


$new_livestock = 'SELECT 
        livestock.`type`,
        livestock.`type_en`,
        livestock_household.quantity, 
        livestock_household.income  
    FROM 
        livestock_household, 
        livestock 
    WHERE 
        livestock_household.fk_household_id = ?
    AND 
        livestock.livestock_id = 
        livestock_household.fk_livestock_id
    ORDER BY
        livestock.`type`';

$result_new_livestock = prepare_input_query($new_livestock, $mysqli, $id);


$total_income = 0;

foreach ($result_new_land as $land) {
        $total_income += $land['income'];
    };




foreach ($result_new_real_estate as $real_estate) {
    $total_income += $real_estate['rent_income'];
};

foreach ($result_new_occupation as $occupation) {
    $total_income += $occupation['income'];
};

foreach ($result_new_livestock as $livestock) {
    $total_income += $livestock['income'];
};

$total_tax = 0;

foreach ($result_new_tax as $tax) {
    $total_tax += $tax['amount'];
};
