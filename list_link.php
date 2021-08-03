<?php

require 'require/conn.php';

    $id = $_GET['id'];
    
    require 'require/prep_statements.php';


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pojedinacno domacinstvo</title>
        <?php require 'require/head.php';?>
    </head>
    <body>
        <?php require 'require/nav.php'?>
    <div class="container alert alert-primary" style="margin-top:30px">
        
        <?php if ($result_new_household != []): ?>
        <h1 class="text-center">Household</h1>
        <table class="table table-striped">
            <tr>
                <th>Location
                <th>ID
                <th>Number
                <th>Forname
                <th>Surname
                <th>Position 
            <tr>
                <td><?php echo $result_new_household[0][0] ?>
                <td><?php echo $result_new_household[0][1] ?>
                <td><?php echo $result_new_household[0][2] ?>
                <td><?php echo $result_new_household[0][3] ?>
                <td><?php echo $result_new_household[0][4] ?>
                <td><?php echo $result_new_household[0][5] ?>
        <?php endif?>
            <?php if ($result_new_household[0][6] != ''): ?>
            <tr>
                <th colspan="6">Notes
            <tr>
                <td colspan="6"><?php echo $result_new_household[0][6] ?>
            <?php endif; ?>
        </table>
        <?php if ($result_new_occupation != []): ?>
        <h2 class="text-center">Occupation(s)</h1>
        <table class="table table-striped">
            <tr>
                <th>Name
                <th>Income
                <th>Proficiency
            <?php foreach ($result_new_occupation as $result): ?>
            <tr>
                <td><?php echo $result[0]?>
                <td><?php echo $result[1]?>
                <td><?php echo $result[2]?>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
        <?php if ($result_new_tax != []): ?>
        <h2 class="text-center">Tax(es)</h1>
        <table class="table table-striped">
            <tr>
                <th>Type
                <th>Amount
                <th>is exused
                <?php foreach ($result_new_tax as $result): ?>
            <tr>
                <td><?php echo $result[0]?>
                <td><?php echo $result[1]?>
                <td><?php echo $result[2]?>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
        <?php if ($result_new_land != []): ?>
        <h2 class="text-center">Land</h1>
        <table class="table table-striped">
            <tr>
                <th>Type
                <th>Area
                <th>Income
                <th>Rent
                <th>Location
                <th>Description
        <?php foreach ($result_new_land as $result): ?>
            <tr>
                <td><?php echo $result[0]?>
                <td><?php echo $result[1]?>
                <td><?php echo $result[2]?>
                <td><?php echo $result[3]?>
                <td><?php echo $result[4]?>
                <td><?php echo $result[5]?> 
        <?php endforeach; ?>
        </table>
        <?php endif; ?>
        <?php if ($result_new_real_estate != []): ?>
        <h2 class="text-center">Real Estate</h1>
        <table class="table table-striped">
            <tr>
                <th>Type
                <th>Quantity
                <th>Income
                <th>Location
                <th>Description 
        <?php foreach ($result_new_real_estate as $result): ?>
            <tr>
                <td><?php echo $result[0]?>
                <td><?php echo $result[1]?>
                <td><?php echo $result[2]?>
                <td><?php echo $result[3]?>
                <td><?php echo $result[4]?> 
        <?php endforeach; ?>
        </table>
        <?php endif; ?>
        <?php if ($result_new_livestock != []): ?>
        <h2 class="text-center">Livestock</h1>
        <table class="table table-striped">
            <tr>
                <th>Type
                <th>Quantity
                <th>Income
        <?php foreach ($result_new_livestock as $result): ?>
            <tr>
                <td><?php echo $result[0]?>
                <td><?php echo $result[1]?>
                <td><?php echo $result[2]?>
        <?php endforeach; ?>
        </table>
        <?php endif; ?>
        <table class="table table-striped">
            <tr>
            <th>Total Income
            <th>Total Tax
            <tr>
            <td><?php echo $total_income; ?>
            <td><?php echo $total_tax; ?>
        </table>
        <div>
            <a href=<?php echo 'list_link.php?id='.$_GET['id'] - 1 ?> >  < </a>
            <a href=<?php echo 'list_link.php?id='.$_GET['id'] + 1 ?> > > </a> 
        </div>
    </div>
        <?php require 'require/jquery.php' ?>
    </body>
</html>