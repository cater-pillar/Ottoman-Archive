<?php

    require ('require/conn.php');

    require ('require/basic_queries.php');

  
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Prikaz baze podataka</title>
        <?php require 'require/head.php';?>
    </head>
    <body>
        <?php require ('require/nav.php'); ?>
        <div class="container alert alert-primary"
        style="margin-top: 30px; margin-bottom: 30px">
        <h1>The Temmettuat Ottoman Registers</h1>
        <div class='row'>
            <div class='col-sm-5'>
            
            <p>In 1844, the Ottoman Empire conducted its final extensive population survey.
            The result of this effort were the Temmettuat registers kept in the Ottoman Archive in Istanbul.
            Registers contain data about the number of households in different settlements, as well as their sources
            of income such as occupation, land, real estate or livestock. Likewise, they contain
            tax information for each household.</p>
            <p>This app is designed to help input information from the registers into a database. Also, it enables
            the user to browse through the households.</p>
            <h5>Progress:</h5>
        <ul>
            <li>Total number of inputs: 
                <?php echo count($result_member)?><br>
            </li>
        </ul>
            </div>
            <div class='col-sm-6'>
                
                <img src='img-example.PNG' class="img-thumbnail">
                <p>Example image from the registers</p>
            </div>
        </div>
        
        </div>
    </body>
</html>