<?php

    $conn = mysqli_connect('localhost', 'root', '', 'prikaz_nisha');

    if(mysqli_connect_errno()){
        echo 'Failed to connect to MySQL' . mysqli_connect_errno();
    };

    // For displaying UTF-8

    mysqli_set_charset($conn, "utf8mb4");

    // LOCATION - this is a self referencing table, I selected only entries of the lowest order 
    // I should consider how to also display higher categories to which the entries belong, also I could try displaying the location.type

    $query_location = 'SELECT 
                  A.`name`,
                  A.`location_name_id`
                  FROM
                    `location_name` AS A
                    INNER JOIN `location_name` AS B
                    	ON A.fk_location_name_id = B.location_name_id
                    INNER JOIN `location_name` AS C
                    	ON B.fk_location_name_id = C.location_name_id
                    ORDER BY A.`name`
            ';
    /*
        SELECT 
                  A.`name`,
                  A.`location_name_id`,
                  `location_type`.`type`
                  FROM
                    `location`.`type`,
                    `location_name` AS A
                    INNER JOIN `location_name` AS B
                    	ON A.fk_location_name_id = B.location_name_id
                    INNER JOIN `location_name` AS C
                    	ON B.fk_location_name_id = C.location_name_id
                    WHERE `location_type`.`location_type_id` = A.`fk_location_type_id`
                    ORDER BY A.`name`

                    THIS SOLUTION DID NOT WORK
    */

    $result_location = mysqli_query($conn, $query_location);

    $final_location = mysqli_fetch_all($result_location);

    // HOUSEHOLD
    $query_household = 'SELECT * FROM `household_member_type` ORDER BY `type`';

    $result_household = mysqli_query($conn, $query_household);

    $final_household = mysqli_fetch_all($result_household);

    // OCCUPATION - this is a self referencing table, I selected only entries of the lowest order

    $query_occupation = 'SELECT 
                            A.*
                            FROM
                            `occupation` AS A
                            INNER JOIN `occupation` AS B
                                ON A.fk_occupation_id = B.occupation_id
                            INNER JOIN `occupation` AS C
                                ON B.fk_occupation_id = C.occupation_id
                            ORDER BY A.`name`';

    $result_occupation = mysqli_query($conn, $query_occupation);

    $final_occupation = mysqli_fetch_all($result_occupation);


    // OCCUPATION TYPE (usta, klafa, cirak)
/*
    $query_occupation_type = "SELECT
                              	COLUMN_TYPE
                              FROM
                              	INFORMATION_SCHEMA.COLUMNS
                              WHERE 
                              	TABLE_NAME = 'occupation_household' AND COLUMN_NAME = 'type'";

    $result_occupation_type = mysqli_query($conn, $query_occupation_type);

    $final_occupation_type = mysqli_fetch_all($result_occupation_type);

    var_dump($final_occupation_type); */

    // TAX
    $query_tax = 'SELECT * FROM `tax` ORDER BY `type`';

    $result_tax = mysqli_query($conn, $query_tax);

    $final_tax = mysqli_fetch_all($result_tax);

    // LAND
    $query_land = 'SELECT * FROM `land` ORDER BY `type`';

    $result_land = mysqli_query($conn, $query_land);

    $final_land = mysqli_fetch_all($result_land);

    // REAL ESTATE
    $query_realestate = 'SELECT * FROM `real_estate` ORDER BY `type`';

    $result_realestate = mysqli_query($conn, $query_realestate);

    $final_realestate = mysqli_fetch_all($result_realestate);

    // LIVESTOCK
 /*   $query_livestock = 'SELECT * FROM `livestock` ORDER BY `type`';

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
        $occupation_type = $_POST['occupation_type'];

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

        $add_occupation = "INSERT INTO occupation_household (fk_occupation_id, income, fk_household_id, `type`)

                           VALUES ('$occupation', '$occupation_income', '$new_key_id', '$occupation_type')
                        ";

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
    <div class="container">
        <h1 class="page-header" style="margin-top: 30px;">Add Household</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" >  <!-- is "action" set OK? -->
        <h2>Location</h2>
        <div class="form-group">
                
                <label for="location"> Select Location Name:</label>
                    <select id="location" name="location" class="form-control">
                          <?php foreach ($final_location as $locations): ?>
                          <option value="<?php echo $locations[1]?>" >
                            <?php echo $locations[0] ?>
                          </option>
                          <?php  endforeach; ?>
                    </select>
        </div>
        <h2>Household Member</h2>
        <div class="form-group">
            
            <label for="forname">Add Forname:</label>
            <input type="text" id="forname" name="forname" class="form-control" placeholder="Forname">
        </div>
        <div class="form-group">  
            <label for="surname">Add Surname:</label>
            <input type="text" id="surname" name="surname" class="form-control" placeholder="Surname">
        </div>
        <div class="form-group">   
            <label for="member_type">Select Household Member Position</label>
                <select id="member_type" name="member_type" class="form-control">
                    <?php foreach ($final_household as $members): ?>
                        <option value="<?php echo $members[0]?>" >
                          <?php echo $members[1] ?>
                        </option>
                    <?php  endforeach; ?>
                </select>
        </div>
        <div class="form-group">    
            <label for="household_number">Add Household Number:</label>
            <input type="number" id="household_number" name="household_number" class="form-control" placeholder="Household Number">
        </div>
        <div class="form-group">   
            <label for="household_notes">Notes:</label>
            <textarea id="household_notes" name="household_notes" class="form-control" placeholder="additional notes..."></textarea>
        </div>
        <h2>Occupation</h2>
        <div class="form-group" id="occupationContainer">
            <label for="occupation">Select Occupation:</label>
                <select id="occupation" name="occupation" class="form-control">
                      <?php foreach ($final_occupation as $occupations): ?>
                      <option value="<?php echo $occupations[0]?>" >
                        <?php echo $occupations[1] ?>
                      </option>
                      <?php  endforeach; ?>
                </select>
        </div>
        <div class="form-group">
            <label for="occupation_income">Add Occupation Income:</label>
            <input type="number" id="occupation_income" name="occupation_income" class="form-control" placeholder="Estimated Yearly Income">
        </div>
        <div class="form-group">
            <label for="occupation_type">Choose Level of Proficiency:</label>
            <select id="occupation_type" name="occupation_type" class="form-control">
                <option value="Usta">Usta</option>
                <option value="Kalfa">Kalfa</option>
                <option value="Çırak">Çırak</option>
            </select>
        </div>
        <div class="form-group">    
            <button class="btn btn-primary btn-sm" onclick="addHTML(occupationString, occupationContainer)">+</button> add another occupation 
            <!-- buttons are currently not working, I need to research how to accomplish that, I tried with JavaScript, but PHP would probably be better -->
        </div>
        <h2>Taxes</h2>
        <div class="form-group">   
                <label for="taxes"> Select Tax:</label>
                    <select id="taxes" name="taxes" class="form-control">
                          <?php foreach ($final_tax as $taxes): ?>
                          <option value="<?php echo $taxes[0]?>" >
                            <?php echo $taxes[1] ?>
                          </option>
                          <?php  endforeach; ?>
                    </select>
        </div>
        <div class="form-group">
                <label for="tax_amount">Add Tax Amount:</label>
                <input type="number" id="tax_amount" name="tax_amount" class="form-control" placeholder="Tax Amount">
        </div>
        <div class="form-group">       
                <button class="btn btn-primary btn-sm">+</button> add another tax 
        </div>
        <h2>Land</h2>
        <div class="form-group">     
                <label for="land_type"> Select Land:</label>
                    <select id="land_type" name="land_type" class="form-control">
                          <?php foreach ($final_land as $lands): ?>
                          <option value="<?php echo $lands[0]?>" >
                            <?php echo $lands[1] ?>
                          </option>
                          <?php  endforeach; ?>
                    </select>
        </div>
        <div class="form-group">
                <label for="land_area">Add Area:</label>
                <input type="number" id="land_area" name="land_area" class="form-control" placeholder="Land Size">
        </div>
        <div class="form-group">        
                <label for="land_income">Add Income:</label>
                <input type="number" id="land_income" name="land_income" class="form-control" placeholder="Income from Land">
        </div>
        <div class="form-group">        
                <label for="land_rent">Add Payed Rent:</label>
                <input type="number" id="land_rent" name="land_rent" class="form-control" placeholder="Rent Payed to the Owner">
        </div>
        <div class="form-group">        
                <label for="land_location">Location:</label>
                <textarea id="land_location" name="land_location" class="form-control" placeholder="land's location..."></textarea>
        </div>
        <div class="form-group">        
                <label for="land_description">Description:</label>
                <textarea id="land_description" name="land_description" class="form-control" placeholder="additional notes..."></textarea>
        </div>
        <div class="form-group">        
                <button class="btn btn-primary btn-sm">+</button> add another land
        </div>      
        <h2>Real Estate</h2>
        <div class="form-group">   
                <label for="real_estate"> Select Real Estate:</label>
                    <select id="real_estate" name="real_estate" class="form-control">
                          <?php foreach ($final_realestate as $realestates): ?>
                          <option value="<?php echo $realestates[0]?>" >
                            <?php echo $realestates[1] ?>
                          </option>
                          <?php  endforeach; ?>
                    </select>
        </div>
        <div class="form-group">       
                <label for="real_estate_quantity">Add Real Estate Quantity:</label>
                <input type="real_estate_quantity" id="real_estate_quantity" name="real_estate_quantity" class="form-control" placeholder="Number of Owned Objects">
        </div>
        <div class="form-group">        
                <label for="real_estate_income">Add Real Estate Income:</label>
                <input type="number" id="real_estate_income" name="real_estate_income" class="form-control" placeholder="Income from Rent">
        </div>
        <div class="form-group">        
                <label for="real_estate_location">Location:</label>
                <textarea id="real_estate_location" name="real_estate_location" class="form-control" placeholder="real estate's location..."></textarea>
        </div>
        <div class="form-group">        
                <label for="real_estate_description">Description:</label>
                <textarea id="real_estate_description" name="real_estate_description" class="form-control" placeholder="additional notes..."></textarea>
        </div>
        <div class="form-group">        
                <button class="btn btn-primary btn-sm">+</button> add another real estate 
        </div>
 <!--       <h2>Livestock</h2>
        <div class="form-group">
                
                <label for="livestock_type"> Select livestock:</label>
                    <select id="livestock_type" name="livestock_type" class="form-control">
                          <?php foreach ($final_livestock as $livestocks): ?>
                          <option value="<?php echo $livestocks[0]?>" >
                            <?php echo $livestocks[1] ?>
                          </option>
                          <?php  endforeach; ?>
                    </select><br>
                
                <label for="livestock_quantity">add livestock quantity:</label>
                <input type="livestock_quantity" id="livestock_quantity" name="livestock_quantity" class="form-control"><br>
                
                <label for="livestock_income">add livestock income:</label>
                <input type="number" id="livestock_income" name="livestock_income" class="form-control"><br>
                
                <button class="btn btn-primary btn-sm">+</button> add another livestock <br>
        </div>  -->  
        <input class="btn btn-primary" type="submit" name="submit" value="Submit" style="margin-bottom: 50px;">
        </from>
    </div>
        <script src="script.js"></script>
    </body>
</html>


