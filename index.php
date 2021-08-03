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
        Total number of inputs: 
            <?php echo count($result_member)?><br>
            
        </div>
    </body>
</html>