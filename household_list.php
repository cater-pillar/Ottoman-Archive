<?php

    require ('require/conn.php');

    require 'functions/prepare_query.php';

    $query_basic = 'SELECT
	`household`.`household_id`,
    `location_name`.`name`,
    `household`.`household_number`,
    `household`.`member_forname`,
    `household`.`member_surname`,
    `household_member_type`.`type`
    FROM 
    `location_name`,
    `household`,
    `household_member_type`
    WHERE
    `household`.`fk_location_name_id` = `location_name`.`location_name_id`
    AND
    `household`.`fk_household_member_type_id` = `household_member_type`.`household_member_type_id`
    ORDER BY `location_name`.`name`, `household`.`household_number`';

    $result_basic = prepare_query($query_basic, $mysqli);
  
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Prikaz svih domaćinastava</title>
        <?php require 'require/head.php';?>
    </head>
    <body>
        <?php require ('require/nav.php'); ?>
        <div class="container">
            <table class='table table-striped'>
                <tr>
                <th> Location
                <th> House Nu
                <th> Name
                <th> Surname
                <th> Status
                <?php foreach ($result_basic as $member): ?>
                    
                    <tr>
                   
                    <td> <a href=<?php echo 'list_link.php?id=' . $member[0]?>><?php echo $member[1] ?> </a>
                    <td><?php echo $member[2] ?>
                    <td><?php echo $member[3] ?>
                    <td><?php echo $member[4] ?>
                    <td><?php echo $member[5] ?>
                   
                <?php endforeach; ?>
            </table>
        </div>
    </body>
</html>