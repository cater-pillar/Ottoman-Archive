<?php
require 'conn.php';
require '../functions/prepare_input_query.php';
require '../functions/edit.php';


$household_id = $_GET['id'];

// Obtain IDs for each referential table in database, ordered according to the category they refer to

$occ_household_id_query = 'SELECT
                            occupation_household_id AS id
                            FROM
                            occupation_household
                            WHERE
                            fk_household_id = ?';

$occupation_household_id = prepare_input_query(
                                $occ_household_id_query, 
                                $mysqli, 
                                $household_id);
                                
$tax_household_id_query = 'SELECT
                            tax_household.tax_household_id AS id
                            FROM
                            tax_household,
                            tax
                            WHERE
                            fk_household_id = ?
                            AND
                            tax_household.fk_tax_id = tax.tax_id
                            GROUP BY
                            tax_household.tax_household_id
                            ORDER BY
                            tax.`type`';

$tax_household_id = prepare_input_query(
                                $tax_household_id_query, 
                                $mysqli, 
                                $household_id);

$land_household_id_query = 'SELECT
                            land_household.land_household_id AS id
                            FROM
                            land_household,
                            land
                            WHERE
                            fk_household_id = ?
                            AND
                            land_household.fk_land_id = land.land_id
                            GROUP BY
                            land_household.land_household_id
                            ORDER BY
                            land.`type`';

$land_household_id = prepare_input_query(
                                $land_household_id_query, 
                                $mysqli, 
                                $household_id);

$estate_household_id_query = 'SELECT
                            real_estate_household.real_estate_household_id AS id
                            FROM
                            real_estate_household,
                            real_estate
                            WHERE
                            fk_household_id = ?
                            AND
                            real_estate_household.fk_real_estate_id = real_estate.real_estate_id
                            GROUP BY
                            real_estate_household.real_estate_household_id
                            ORDER BY
                            real_estate.`type`';

$real_estate_household_id = prepare_input_query(
                                $estate_household_id_query, 
                                $mysqli, 
                                $household_id);

$livestock_household_id_query = 'SELECT
                            livestock_household.livestock_household_id AS id
                            FROM
                            livestock_household,
                            livestock
                            WHERE
                            fk_household_id = ?
                            AND
                            livestock_household.fk_livestock_id = livestock.livestock_id
                            GROUP BY
                            livestock_household.livestock_household_id
                            ORDER BY
                            livestock.`type`';

$livestock_household_id = prepare_input_query(
                                $livestock_household_id_query, 
                                $mysqli, 
                                $household_id);


 
    // Check For Submit


    if(isset($_POST['submit'])){
        
 
        // Edit data in the main HOUSEHOLD table 
        
        
        if (isset($_POST['location']) ) {
                edit($_POST['location'], 
                    "household",
                    'fk_location_name_id',
                    'household_id',
                    $household_id,
                    $mysqli,
                    'i');}; 
        
        if (isset($_POST['forname'])) {
                edit($_POST['forname'], 
                    "household",
                    'member_forname',
                    'household_id',
                    $household_id,
                    $mysqli,
                    's');}; 

        if (isset($_POST['surname'])) {edit($_POST['surname'], 
                                            "household",
                                            'member_surname',
                                            'household_id',
                                            $household_id,
                                            $mysqli,
                                            's');}; 

        if (isset($_POST['member_type'])) {edit(
                                            $_POST['member_type'], 
                                            "household",
                                            'fk_household_member_type',
                                            'household_id',
                                            $household_id,
                                            $mysqli,
                                            'i');}; 

        if (isset($_POST['household_number'])) {edit(
                                                $_POST['household_number'], 
                                                "household",
                                                'household_number',
                                                'household_id',
                                                $household_id,
                                                $mysqli,
                                                'i');}; 

        if (isset($_POST['household_notes'])) {edit(
                                                $_POST['household_notes'], 
                                                "household",
                                                'notes',
                                                'household_id',
                                                $household_id,
                                                $mysqli,
                                                's');}; 

 
        
        // EDIT DATA IN RELATIONAL TABLES

        // set increment

        $i_occ = 1;
        
        
        // use foreach loop to edit data for each occupation
         
        foreach ($occupation_household_id as $id) {
            if (isset($_POST['occupation'. $i_occ])) {edit(
                                                        $_POST['occupation'. $i_occ],
                                                        "occupation_household",
                                                        "fk_occupation_id",
                                                        "occupation_household_id",
                                                        $id['id'],
                                                        $mysqli,
                                                        'i');};
            if (isset($_POST['occupation_income'. $i_occ])) {edit(
                                                        $_POST['occupation_income'. $i_occ],
                                                        "occupation_household",
                                                        "income",
                                                        "occupation_household_id",
                                                        $id['id'],
                                                        $mysqli,
                                                        'i');};

        $i_occ ++;
        };

 
        
        // set increment

        $i_tax = 1;

        foreach ($tax_household_id as $id) {
            if (isset($_POST['tax_type'. $i_tax])) {edit(
                                                    $_POST['tax_type'. $i_tax],
                                                    "tax_household",
                                                    "fk_tax_id",
                                                    "tax_household_id",
                                                    $id['id'],
                                                    $mysqli,
                                                    'i');};
            if (isset($_POST['tax_amount'. $i_tax])) {edit(
                                                        $_POST['tax_amount'. $i_tax],
                                                        "tax_household",
                                                        "amount",
                                                        "tax_household_id",
                                                        $id['id'],
                                                        $mysqli,
                                                        'i');};

            $i_tax ++;
        };

 


        // set increment

        $i_land = 1; 

        // use foreach loop to edit data for each land

        foreach ($land_household_id as $id) {

            if (isset($_POST['land_type'. $i_land])) {edit(
                                                        $_POST['land_type'. $i_land],
                                                        "land_household",
                                                        "fk_land_id",
                                                        "land_household_id",
                                                        $id['id'],
                                                        $mysqli,
                                                        'i');};
            if (isset($_POST['land_area'. $i_land])) {edit(
                                                        $_POST['land_area'. $i_land],
                                                        "land_household",
                                                        "area",
                                                        "land_household_id",
                                                        $id['id'],
                                                        $mysqli,
                                                        'i');};
            if (isset($_POST['land_income'. $i_land])) {edit(
                                                        $_POST['land_income'. $i_land],
                                                        "land_household",
                                                        "income",
                                                        "land_household_id",
                                                        $id['id'],
                                                        $mysqli,
                                                        'i');};


            if (isset($_POST['land_rent'. $i_land])) {edit(
                                                        $_POST['land_rent'. $i_land],
                                                        "land_household",
                                                        "payed_rent",
                                                        "land_household_id",
                                                        $id['id'],
                                                        $mysqli,
                                                        'i');};
            if (isset($_POST['land_location'. $i_land])) {edit(
                                                        $_POST['land_location'. $i_land],
                                                        "land_household",
                                                        "`location`",
                                                        "land_household_id",
                                                        $id['id'],
                                                        $mysqli,
                                                        's');};
            if (isset($_POST['land_description'. $i_land])) {edit(
                                                        $_POST['land_description'. $i_land],
                                                        "land_household",
                                                        "`description`",
                                                        "land_household_id",
                                                        $id['id'],
                                                        $mysqli,
                                                        's');};

            $i_land ++;
        };



        
        // set increment

        $i_estate = 1;

        // use foreach loop to edit data for each real estate

        
        foreach ($real_estate_household_id as $id) {
            if (isset($_POST['real_estate_type'. $i_estate])) {edit(
                                                        $_POST['real_estate_type'. $i_estate],
                                                        "real_estate_household",
                                                        "fk_real_estate_id",
                                                        "real_estate_household_id",
                                                        $id['id'],
                                                        $mysqli,
                                                        'i');};
            if (isset($_POST['real_estate_quantity'. $i_estate])) {edit(
                                                        $_POST['real_estate_quantity'. $i_estate],
                                                        "real_estate_household",
                                                        "quantity",
                                                        "real_estate_household_id",
                                                        $id['id'],
                                                        $mysqli,
                                                        'i');};
            if (isset($_POST['real_estate_income'. $i_estate])) {edit(
                                                        $_POST['real_estate_income'. $i_estate],
                                                        "real_estate_household",
                                                        "rent_income",
                                                        "real_estate_household_id",
                                                        $id['id'],
                                                        $mysqli,
                                                        'i');};
            if (isset($_POST['real_estate_location'. $i_estate])) {edit(
                                                        $_POST['real_estate_location'. $i_estate],
                                                        "real_estate_household",
                                                        "`location`",
                                                        "real_estate_household_id",
                                                        $id['id'],
                                                        $mysqli,
                                                        's');};
            if (isset($_POST['real_estate_description'. $i_estate])) {edit(
                                                        $_POST['real_estate_description'. $i_estate],
                                                        "real_estate_household",
                                                        "`description`",
                                                        "real_estate_household_id",
                                                        $id['id'],
                                                        $mysqli,
                                                        's');};
            $i_estate ++;
        };
    
        
        // set increment

        $i_livestock = 1;

        // use foreach loop to edit data for each livestock

        foreach ($livestock_household_id as $id) {
            if (isset($_POST['livestock_type'. $i_livestock])) {edit(
                                                        $_POST['livestock_type'. $i_livestock],
                                                        "livestock_household",
                                                        "fk_livestock_id",
                                                        "livestock_household_id",
                                                        $id['id'],
                                                        $mysqli,
                                                        'i');};
            if (isset($_POST['livestock_quantity'. $i_livestock])) {edit(
                                                        $_POST['livestock_quantity'. $i_livestock],
                                                        "livestock_household",
                                                        "quantity",
                                                        "livestock_household_id",
                                                        $id[0],
                                                        $mysqli,
                                                        'i');};
            if (isset($_POST['livestock_income'. $i_livestock])) {edit(
                                                        $_POST['livestock_income'. $i_livestock],
                                                        "livestock_household",
                                                        "income",
                                                        "livestock_household_id",
                                                        $id['id'],
                                                        $mysqli,
                                                        'i');};
            $i_livestock ++;
        };



        // reset increments (maybe unnecessary because SUBMIT already resets the entire page)

        $i_occ = 1;
        $i_tax = 1;
        $i_land = 1;
        $i_estate = 1;
        $i_livestock = 1;
        
        
        if ($_GET['src'] == 'listlink')
        {
            header('Location: http://localhost/ottoman/list_link.php?id='.$household_id); 
        };
        if ($_GET['src'] == 'lastadded')
        {
            header('Location: http://localhost/ottoman/input_form.php'); 
        };
    };
    