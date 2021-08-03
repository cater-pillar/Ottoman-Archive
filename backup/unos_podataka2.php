<?php

    $conn = mysqli_connect('localhost', 'root', '', 'prikaz_nisha');

    if(mysqli_connect_errno()){
        echo 'Failed to connect to MySQL' . mysqli_connect_errno();
    };

    // query("SET NAMES utf8");   my HTML file is not displaying UTF-8 properly!

    // LOCATION
    $query_location = 'SELECT 
                  `location_name`.`name`,
                  `location_name`.`location_name_id`
              FROM
                  `location_name`
              WHERE
                  `location_name`.`fk_location_name_id` IS NOT null
              AND
                  `location_name`.`location_name_id` != `location_name`.`fk_location_name_id`
            ';

    $result_location = mysqli_query($conn, $query_location);

    $final_location = mysqli_fetch_all($result_location);

    // HOUSEHOLD
    $query_household = 'SELECT * FROM `household_member_type`';

    $result_household = mysqli_query($conn, $query_household);

    $final_household = mysqli_fetch_all($result_household);

    // OCCUPATION
    $query_occupation = 'SELECT * FROM `occupation`';

    $result_occupation = mysqli_query($conn, $query_occupation);

    $final_occupation = mysqli_fetch_all($result_occupation);

    // TAX
    $query_tax = 'SELECT * FROM `tax`';

    $result_tax = mysqli_query($conn, $query_tax);

    $final_tax = mysqli_fetch_all($result_tax);

    // LAND
    $query_land = 'SELECT * FROM `land`';

    $result_land = mysqli_query($conn, $query_land);

    $final_land = mysqli_fetch_all($result_land);

    // REAL ESTATE
    $query_realestate = 'SELECT * FROM `real_estate`';

    $result_realestate = mysqli_query($conn, $query_realestate);

    $final_realestate = mysqli_fetch_all($result_realestate);

    // LIVESTOCK
 /*   $query_livestock = 'SELECT * FROM `livestock`';

    $result_livestock = mysqli_query($conn, $query_livestock);

    $final_livestock = mysqli_fetch_all($result_livestock);  */
    
    // Check For Submit

    if(isset($_POST['submit'])){
        
        // Get form data
        
        $location = $_POST['location'];

        $forname = $_POST['forname'];
        $surname = $_POST['surname'];
        $member_type = $_POST['member_type'];
        $household_number = $_POST['household_number'];
        $household_notes = $_POST['household_notes'];

        $occupation = $_POST['occupation'];
        $occupation_income = $_POST['occupation_income'];

        $taxes = $_POST['taxes'];
        $tax_amount = $_POST['tax_amount'];

        $land_type = $_POST['land_type'];
        $land_area = $_POST['land_area'];
        $land_income = $_POST['land_income'];
        $land_rent = $_POST['land_rent'];
        $land_location = $_POST['land_location'];
        $land_description = $_POST['land_description'];

        $real_estate = $_POST['real_estate'];
        $real_estate_quantity = $_POST['real_estate_quantity'];
        $real_estate_income = $_POST['real_estate_income'];
        $real_estate_location = $_POST['real_estate_location'];
        $real_estate_description = $_POST['real_estate_description'];

/*        $livestock_type = $_POST['livestock_type'];
        $livestock_quantity = $_POST['livestock_quantity'];
        $livestock_income = $_POST['livestock_income']; */
    
        // QUERY TO INSERT DATA INTO DATABASE

        $add_household = "INSERT INTO household (fk_location_name_id, member_forname, member_surname, fk_household_member_type_id, household_number, notes)

                            VALUES ('$location', '$forname', '$surname', '$member_type', '$household_number', '$household_notes')  
                        ";

        // INSERT NEW HOUSEHOLD
        
        if (mysqli_query($conn, $add_household)) {
            echo "Household added succesfully<br>";
        } else {
            echo "Error: " .$add_household. "<br>" . mysqli_error($conn);
        };

        // OBTAIN THE LATEST KEY

        $new_key_id = mysqli_insert_id($conn);
        
        // INSERT DATA INTO RELATIONAL TABLES

        $add_occupation = "INSERT INTO occupation_household (fk_occupation_id, income, fk_household_id)

                           VALUES ('$occupation', '$occupation_income', '$new_key_id')
                        "; // MISSING 'type' (e.g. "kalfa") 

        $add_taxes = "INSERT INTO tax_household (fk_tax_id, amount, fk_household_id)
                      VALUES ('$taxes', '$tax_amount', '$new_key_id')";

        $add_land = "INSERT INTO land_household (fk_land_id, area, income, payed_rent, `location`, `description`, fk_household_id)
                     VALUES ('$land_type', '$land_area', '$land_income', '$land_rent', '$land_location', '$land_description', '$new_key_id')";
                     // why is 'location' and 'description' marked in blue?

        $add_real_estate = "INSERT INTO real_estate_household (fk_real_estate_id, quantity, rent_income, `location`, `description`, fk_household_id)
                            VALUES ('$real_estate', '$real_estate_quantity', '$real_estate_income', '$real_estate_location', '$real_estate_description', '$new_key_id')";
                            // why is 'location' and 'description' marked in blue?
        
 //       $add_livestock = "INSERT INTO livestock_household (fk_livestock_id, quantity, income, fk_household_id)
  //                        VALUES ('$livestock_type', '$livestock_quantity', '$livestock_income', '$new_key_id')";

        // TO INSERT REMAINING DATA

        if (mysqli_query($conn, $add_occupation)) {
            echo "Occupation added succesfully<br>";
        } else {
            echo "Error: " .$add_occupation. "<br>" . mysqli_error($conn);
        };
        if (mysqli_query($conn, $add_taxes)) {
            echo "Tax added succesfully<br>";
        } else {
            echo "Error: " .$add_taxes. "<br>" . mysqli_error($conn);
        };
        if (mysqli_query($conn, $add_land)) {
            echo "Land added succesfully<br>";
        } else {
            echo "Error: " .$add_land. "<br>" . mysqli_error($conn);
        };
        if (mysqli_query($conn, $add_real_estate)) {
            echo "Real estate added succesfully<br>";
        } else {
            echo "Error: " .$add_real_estate. "<br>" . mysqli_error($conn);
        };
 /*       if (mysqli_query($conn, $add_livestock)) {
            echo "Livestock added succesfully";
        } else {
         echo "Error: " .$add_livestock. "<br>" . mysqli_error($conn);
        };*/
    };
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Unos podataka u bazu</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
    </head>
    <body>
        <h1>Add Household</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">  <!-- is "action" set OK? -->
        <h2>Location</h2>
        <div class="container">
                
                <label for="location"> Select location name:</label>
                    <select id="location" name="location">
                          <?php foreach ($final_location as $locations): ?>
                          <option value="<?php echo $locations[1]?>" >
                            <?php echo $locations[0] ?>
                          </option>
                          <?php  endforeach; ?>
                    </select>
        </div>
        <h2>Household member</h2>
        <div class="container">
            
            <label for="forname">add forname:</label>
            <input type="text" id="forname" name="forname"><br>
            
            <label for="surname">add forname:</label>
            <input type="text" id="surname" name="surname"><br>
            
            <label for="member_type">Select household member position</label>
                <select id="member_type" name="member_type">
                    <?php foreach ($final_household as $members): ?>
                        <option value="<?php echo $members[0]?>" >
                          <?php echo $members[1] ?>
                        </option>
                    <?php  endforeach; ?>
                </select><br>
            
            <label for="household_number">add household number:</label>
            <input type="number" id="household_number" name="household_number"><br>
            
            <label for="household_notes"> notes:</label>
            <textarea id="household_notes" name="household_notes"></textarea>
        </div>
        <h2>Occupation</h2>
        <div class="container" id="occupationContainer">
                
                
                
                <?php if(isset($_POST['add_another_occupation'])) {
                    echo '<label for="occupation"> Select occupation:</label>
                          <select id="occupation" name="occupation">
                            <?php foreach ({$final_occupation} as $occupations): ?>
                                <option value="<?php echo $occupations[0]?>" >
                                    <?php echo $occupations[1] ?>
                                </option>
                            <?php  endforeach; ?>
                          </select><br>
                        
                        <label for="occupation_income">add occupation income:</label>
                        <input type="number" id="occupation_income" name="occupation_income"><br>';}
                                     ?>          

            <input type="submit" name="add_another_occupation" value="+" class="button"> add another occupation <br>
        </div>
        <h2>Taxes</h2>
        <div class="container">
                
                <label for="taxes"> Select tax:</label>
                    <select id="taxes" name="taxes">
                          <?php foreach ($final_tax as $taxes): ?>
                          <option value="<?php echo $taxes[0]?>" >
                            <?php echo $taxes[1] ?>
                          </option>
                          <?php  endforeach; ?>
                    </select><br>
                
                <label for="tax_amount">add tax amount:</label>
                <input type="number" id="tax_amount" name="tax_amount"><br>
                
                <button>+</button> add another tax <br>
        </div>
        <h2>Land</h2>
        <div class="container">
                
                <label for="land_type"> Select land:</label>
                    <select id="land_type" name="land_type">
                          <?php foreach ($final_land as $lands): ?>
                          <option value="<?php echo $lands[0]?>" >
                            <?php echo $lands[1] ?>
                          </option>
                          <?php  endforeach; ?>
                    </select><br>
                
                <label for="land_area">add area:</label>
                <input type="number" id="land_area" name="land_area"><br>
                
                <label for="land_income">add income:</label>
                <input type="number" id="land_income" name="land_income"><br>
                
                <label for="land_rent">add payed rent:</label>
                <input type="number" id="land_rent" name="land_rent"><br>
                
                <label for="land_location"> location:</label>
                <textarea id="land_location" name="land_location"></textarea><br>
                
                <label for="land_description"> description:</label>
                <textarea id="land_description" name="land_description"></textarea><br>
                
                <button>+</button> add another land <br>
        </div>      
        <h2>Real Estate</h2>
        <div class="container">
                
                <label for="real_estate"> Select real estate:</label>
                    <select id="real_estate" name="real_estate">
                          <?php foreach ($final_realestate as $realestates): ?>
                          <option value="<?php echo $realestates[0]?>" >
                            <?php echo $realestates[1] ?>
                          </option>
                          <?php  endforeach; ?>
                    </select><br>
                
                <label for="real_estate_quantity">add real estate quantity:</label>
                <input type="real_estate_quantity" id="real_estate_quantity" name="real_estate_quantity"><br>
                
                <label for="real_estate_income">add real estate income:</label>
                <input type="number" id="real_estate_income" name="real_estate_income"><br>
                
                <label for="real_estate_location"> location:</label>
                <textarea id="real_estate_location" name="real_estate_location"></textarea><br>
                
                <label for="real_estate_description"> description:</label>
                <textarea id="real_estate_description" name="real_estate_description"></textarea><br>
                
                <button>+</button> add another real estate <br>
        </div>
 <!--       <h2>Livestock</h2>
        <div class="container">
                
                <label for="livestock_type"> Select livestock:</label>
                    <select id="livestock_type" name="livestock_type">
                          <?php foreach ($final_livestock as $livestocks): ?>
                          <option value="<?php echo $livestocks[0]?>" >
                            <?php echo $livestocks[1] ?>
                          </option>
                          <?php  endforeach; ?>
                    </select><br>
                
                <label for="livestock_quantity">add livestock quantity:</label>
                <input type="livestock_quantity" id="livestock_quantity" name="livestock_quantity"><br>
                
                <label for="livestock_income">add livestock income:</label>
                <input type="number" id="livestock_income" name="livestock_income"><br>
                
                <button>+</button> add another livestock <br>
        </div>  -->  
        <input type="submit" name="submit" value="Submit">
        </from>
    </body>
</html>


