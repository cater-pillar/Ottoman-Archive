<?php

require 'require/conn.php';

    $id = $_GET['id'];
    
    require 'require/prep_statements.php';


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Single Household</title>
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
                <td><?php echo $result_new_household[0]['name'] ?>
                <td><?php echo $result_new_household[0]['household_id'] ?>
                <td><?php echo $result_new_household[0]['household_number'] ?>
                <td><?php echo $result_new_household[0]['member_forname'] ?>
                <td><?php echo $result_new_household[0]['member_surname'] ?>
                <td><?php echo $result_new_household[0]['type'] .'/'. $result_new_household[0]['type_en'] ?>
        <?php endif?>
            <?php if ($result_new_household[0]['notes'] != ''): ?>
            <tr>
                <th colspan="6">Notes
            <tr>
                <td colspan="6"><?php echo $result_new_household[0]['notes'] ?>
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
                <td><?php echo $result['name'] .'/'. $result['name_en']?>
                <td><?php echo $result['income']?>
                <td><?php echo $result['type']?>
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
                <td><?php echo $result['type'] .'/'. $result['type_en']?>
                <td><?php echo $result['amount']?>
                <td><?php echo $result['is_exused']?>
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
                <td><?php echo $result['type'] .'/'. $result['type_en']?>
                <td><?php echo $result['area']?>
                <td><?php echo $result['income']?>
                <td><?php echo $result['payed_rent']?>
                <td><?php echo $result['location']?>
                <td><?php echo $result['description']?> 
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
                <td><?php echo $result['type'] .'/'. $result['type_en']?>
                <td><?php echo $result['quantity']?>
                <td><?php echo $result['rent_income']?>
                <td><?php echo $result['location']?>
                <td><?php echo $result['description']?> 
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
                <td><?php echo $result['type'] .'/'. $result['type_en']?>
                <td><?php echo $result['quantity']?>
                <td><?php echo $result['income']?>
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
        <div class='d-flex justify-content-between'>
            <a href=<?php echo 'list_link.php?id='. ($_GET['id'] - 1) ?> 
               class='btn btn-primary'>  < </a>
               <a href=<?php echo "http://localhost/ottoman/edit_form.php?src=listlink&id=".$_GET['id'] ?>
               class="btn btn-warning" 
               style="margin-right:10px; width:70px" >Edit</a>
            <a href=<?php echo 'list_link.php?id='.($_GET['id'] + 1) ?> 
               class='btn btn-primary'> > </a> 
        </div>
    </div>
        <?php require 'require/jquery.php' ?>
    </body>
</html>