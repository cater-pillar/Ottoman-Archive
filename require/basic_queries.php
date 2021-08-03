<?php

    require 'functions/prepare_query.php';


    // LOCATION - this is a self referencing table, 
    // I selected only entries of the lowest order 
    // I should consider how to also display higher categories 
    // to which the entries belong, 
    // also I could try displaying the location.type

    $query_location = 'SELECT 
        A.`name`,
        A.`location_name_id`
        FROM
        `location_name` AS A
        INNER JOIN `location_name` AS B
            ON A.fk_location_name_id = B.location_name_id
        INNER JOIN `location_name` AS C
            ON B.fk_location_name_id = C.location_name_id
        ORDER BY A.`name`';
    

    $result_location = prepare_query($query_location, $mysqli);



    // HOUSEHOLD
    $query_household = 'SELECT * FROM `household_member_type` ORDER BY `type`';

    $result_household = prepare_query($query_household, $mysqli);
    

    // HOUSEHOLD MEMBERS

    $query_member = 'SELECT * FROM `household`';

    $result_member = prepare_query($query_member, $mysqli);

    // OCCUPATION - this is a self referencing table, 
    // I selected only entries of the lowest order - FAILED!

    $query_occupation = 'SELECT 
            A.*
        FROM
            `occupation` AS A
        INNER JOIN `occupation` AS B
            ON A.fk_occupation_id = B.occupation_id
        INNER JOIN `occupation` AS C
            ON B.fk_occupation_id = C.occupation_id
        ORDER BY A.`name`';

    $result_occupation = prepare_query($query_occupation, $mysqli);

    
    // TAX
    $query_tax = 'SELECT * FROM `tax` ORDER BY `type`';

    $result_tax = prepare_query($query_tax, $mysqli);


    // LAND
    $query_land = 'SELECT * FROM `land` ORDER BY `type`';

    $result_land = prepare_query($query_land, $mysqli);


    // REAL ESTATE
    $query_realestate = 'SELECT * FROM `real_estate` ORDER BY `type`';

    $result_realestate = prepare_query($query_realestate, $mysqli);


    // LIVESTOCK
    $query_livestock = 'SELECT * FROM `livestock` ORDER BY `type`';

    $result_livestock = prepare_query($query_livestock, $mysqli);

    