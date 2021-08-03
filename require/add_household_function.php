<?php
require 'conn.php';

require '../functions/prepare_input_query.php';

session_start();

// Code to memorize last selected location in order to display it in the form

$get_location = 'SELECT `name`
                     FROM
                     location_name
                     WHERE
                     location_name_id = ?';

    if (isset($_POST['location'])) {                    

    $_SESSION['location_id'] = $_POST['location'];

    $_SESSION['location_name'] = prepare_input_query($get_location, 
                                                     $mysqli, 
                                                     $_SESSION['location_id']);
    };

    

    // Check For Submit

    if(isset($_POST['submit'])){
        
        // Get form data
        
        $location = $_POST['location'];

        $forname = $_POST['forname'];

        $surname = $_POST['surname'];


        $member_type = $_POST['member_type'];
        $household_number = $_POST['household_number'];
        $household_notes = $_POST['household_notes'];



    
        // QUERY TO INSERT DATA INTO DATABASE

        $add_household = $mysqli -> prepare(
                        "INSERT INTO 
                        household (fk_location_name_id, 
                                   member_forname, 
                                   member_surname, 
                                   fk_household_member_type_id, 
                                   household_number, notes)
                        VALUES (?, ?, ?, ?, ?, ?)"); 
        
        $add_household -> bind_param("issiis", 
                                     $location, 
                                     $forname, 
                                     $surname, 
                                     $member_type, 
                                     $household_number, 
                                     $household_notes);

        // INSERT NEW HOUSEHOLD
        
            if ($add_household -> execute()) {
                echo '<div class="alert alert-success">Household added succesfully</div>';
            } else {
            echo '<div class="alert alert-danger">Error: ' 
                  .$add_household. 
                  "<br>" . $mysqli -> error . '</div>';
        };

        // OBTAIN THE LATEST KEY

        $new_key_id = $mysqli -> insert_id;
        
        // INSERT DATA INTO RELATIONAL TABLES

        // set increment

        $i_occ = 1;
        
        // set prepared statement

        $add_occupation = $mysqli -> prepare(
                        "INSERT INTO 
                        occupation_household (fk_occupation_id, 
                                              income, 
                                              fk_household_id, 
                                              `type`)
                        VALUES (?, ?, ?, ?)");
        
        // use while loop to insert data for each occupation form added via AJAX

        while (isset($_POST['occupation'. $i_occ]) &&  
               isset($_POST['occupation_income'. $i_occ]) && 
               isset($_POST['occupation_type'. $i_occ])) {

            $add_occupation -> bind_param("iiis", 
                                          $_POST['occupation'. $i_occ], 
                                          $_POST['occupation_income'. $i_occ], 
                                          $new_key_id, 
                                          $_POST['occupation_type'. $i_occ]);

            if ($add_occupation -> execute()) {
                echo '<div class="alert alert-success">Occupation '. 
                $i_occ . ' added succesfully</div>';
            } else {
                echo '<div class="alert alert-danger">Error: ' 
                .$add_occupation. "<br>" . $mysqli -> error . '</div>';
            };
            $i_occ++;
        };
        
        // set increment

        $i_tax = 1;

        // set prepared statement

        $add_taxes = $mysqli -> prepare(
                    "INSERT INTO 
                        tax_household (fk_tax_id, 
                                       amount, 
                                       fk_household_id)
                      VALUES (?, ?, ?)");
        
        // use while loop to insert data for each tax form added via AJAX

        while (isset($_POST['taxes' .$i_tax]) &&  
               isset($_POST['tax_amount' .$i_tax])) {    
        
            $add_taxes -> bind_param("iii", 
                                     $_POST['taxes' .$i_tax], 
                                     $_POST['tax_amount' .$i_tax], 
                                     $new_key_id);

            if ($add_taxes -> execute()) {
                echo '<div class="alert alert-success">Tax ' 
                .$i_tax. ' added succesfully</div>';
            } else {
                echo '<div class="alert alert-danger">Error: ' 
                .$add_taxes. "<br>" . $mysqli -> error . '</div>';
            };
            $i_tax++;
        };

        // set increment

        $i_land = 1;

        // set prepared statement

        $add_land = $mysqli -> prepare(
                    "INSERT INTO 
                        land_household (fk_land_id, 
                                        area, 
                                        income, 
                                        payed_rent, 
                                        `location`, 
                                        `description`, 
                                        fk_household_id)
                     VALUES (?, ?, ?, ?, ?, ?, ?)");

        // use while loop to insert data for each land form added via AJAX

        while (isset($_POST['land_type' .$i_land]) &&
               isset($_POST['land_area' .$i_land]) &&
               isset($_POST['land_income' .$i_land]) &&
               isset($_POST['land_rent' .$i_land]) &&
               isset($_POST['land_location' .$i_land]) &&
               isset($_POST['land_description' .$i_land])) {

                   
            $add_land -> bind_param("iiiissi", 
                                    $_POST['land_type' .$i_land], 
                                    $_POST['land_area' .$i_land], 
                                    $_POST['land_income' .$i_land], 
                                    $_POST['land_rent' .$i_land], 
                                    $_POST['land_location' .$i_land], 
                                    $_POST['land_description' .$i_land], 
                                    $new_key_id);


            if ($add_land -> execute()) {
                echo '<div class="alert alert-success">Land ' 
                .$i_land. ' added succesfully</div>';
            } else {
                echo '<div class="alert alert-danger">Error: ' 
                .$add_land. "<br>" . $mysqli -> error . '</div>';
            };
            $i_land++;
        };

        // set increment

        $i_estate = 1;

        // set prepared statement

        $add_real_estate = $mysqli -> prepare(
                            "INSERT INTO 
                                real_estate_household (fk_real_estate_id, 
                                                       quantity, 
                                                       rent_income, 
                                                       `location`, 
                                                       `description`, 
                                                       fk_household_id)
                            VALUES (?, ?, ?, ?, ?, ?)");

        // use while loop to insert data for each real estate form added via AJAX
                     
        while (isset($_POST['real_estate' .$i_estate]) &&
               isset($_POST['real_estate_quantity' .$i_estate]) &&
               isset($_POST['real_estate_income' .$i_estate]) &&
               isset($_POST['real_estate_location' .$i_estate]) &&
               isset($_POST['real_estate_description' .$i_estate])) {

                
        $add_real_estate -> bind_param("iiissi", 
                                        $_POST['real_estate' .$i_estate], 
                                        $_POST['real_estate_quantity' .$i_estate], 
                                        $_POST['real_estate_income' .$i_estate], 
                                        $_POST['real_estate_location' .$i_estate], 
                                        $_POST['real_estate_description' .$i_estate], 
                                        $new_key_id);


            if ($add_real_estate -> execute()) {
                echo '<div class="alert alert-success">Real estate ' 
                .$i_estate. ' added succesfully</div>';
            } else {
                echo '<div class="alert alert-danger">Error: ' 
                .$add_real_estate. "<br>" . $mysqli -> error . '</div>';
            };
            $i_estate++;
        };

        // set increment

        $i_livestock = 1;

        // set prepared statement

        $add_livestock = $mysqli -> prepare(
                        "INSERT INTO 
                            livestock_household (fk_livestock_id, 
                                                 quantity, 
                                                 income, 
                                                 fk_household_id)
                            VALUES (?, ?, ?, ?)");

        // use while loop to insert data for each livestock form added via AJAX
                     
        while (isset($_POST['livestock' .$i_livestock]) &&
               isset($_POST['livestock_quantity' .$i_livestock]) &&
               isset($_POST['livestock_income' .$i_livestock])) {

                
            $add_livestock -> bind_param("iiii", 
                                        $_POST['livestock' .$i_livestock], 
                                        $_POST['livestock_quantity' .$i_livestock], 
                                        $_POST['livestock_income' .$i_livestock], 
                                        $new_key_id);
    

            if ($add_livestock -> execute()) {
                echo '<div class="alert alert-success">Livestock ' 
                .$i_livestock. ' added succesfully</div>';
            } else {
                echo '<div class="alert alert-danger">Error: ' 
                .$add_livestock. "<br>" . $mysqli -> error . '</div>';
            };
            $i_livestock++;
        };

        // reset increments (maybe unnecessary because SUBMIT already resets the entire page)

        $i_occ = 1;
        $i_tax = 1;
        $i_land = 1;
        $i_estate = 1;
        $i_livestock = 1;

        header('Location: http://localhost/prikazNisha/uspesno_dodato.php');
    };