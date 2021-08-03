<?php

    require 'require/conn.php';

    function prepare_query($query, $conn) {
        $prep = $conn -> prepare($query); 
        $prep -> execute();
        $result = $prep -> get_result();
        return $user = $result -> fetch_all();};
    

    $query_location = 'SELECT 
    *
    FROM
    location_name';

    $query_location_type = 'SELECT
    *
    FROM
    location_type';

$result_location = prepare_query($query_location, $mysqli);

$result_location_type = prepare_query($query_location_type, $mysqli);



    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Filter</title>
        <?php require 'require/head.php';?>
        <script>
/**
           function filterLocation(id) {
               let xhr = new XMLHttpRequest();
               xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
         var id = this.responseText;
         return id;
      }
               }
           };  */


// DON'T FORGET onchange="filterLocation(this.value)"
        </script>
    </head>
    <body>
    <?php require 'require/nav.php'?>
    <div class="container">
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" >  <!-- is "action" set OK? -->
        <h2>Location</h2>
        <div class="form-group">
                
                <label for="location"> Select Kaza:</label>
                    <select id="location" name="location" class="form-control">
                          <?php foreach ($result_location as $locations): ?>
                          <?php if ($locations[2] == 2): ?>
                          <option value="<?php echo $locations[0]?>" >
                            <?php echo $locations[1]; ?>
                          </option>
                          <?php endif; ?>
                          <?php  endforeach; ?>
                    </select>
        </div>
        
        <div class="form-group">
                
                <label for="location"> Select Location Type:</label>
                    <select id="location_type" name="location_type" class="form-control">
                          <?php foreach ($result_location_type as $locations): ?>
                          <?php if ($locations[0] !== 2): ?>
                          <option value="<?php echo $locations[0]?>" >
                            <?php echo $locations[1]; ?>
                          </option>
                          <?php endif; ?>
                          <?php  endforeach; ?>
                    </select>
        </div>
        
        <div class="form-group">
            <input type="submit" name="submit" valute="Submit">
        </div>
        
        <div class="form-group">
                
                <label for="location"> Select Location Name:</label>
                    <select id="location_name" name="location_name" class="form-control">
                          <?php foreach ($result_location as $locations): ?>
                          <?php if ($locations[2] == $_POST["location_type"][0]): ?>
                          <option value="<?php echo $locations[0]?>" >
                            <?php echo $locations[1]; ?>
                          </option>
                          <?php endif; ?>
                          <?php  endforeach; ?>
                    </select>
        </div>
       

    </form> 
    </div>