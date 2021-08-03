<?php

    require 'require/conn.php';


    $max_id = $mysqli -> query('SELECT MAX(household_id) FROM household') -> fetch_all();

    $id = $max_id[0][0];

    require 'require/prep_statements.php';


    if(isset($_POST['delete'])) {
        $mysqli->query("DELETE FROM land_household WHERE land_household.fk_household_id = ".$id);
        $mysqli->query("DELETE FROM livestock_household WHERE livestock_household.fk_household_id = ".$id);
        $mysqli->query("DELETE FROM occupation_household WHERE occupation_household.fk_household_id = ".$id);
        $mysqli->query("DELETE FROM real_estate_household WHERE real_estate_household.fk_household_id = ".$id);
        $mysqli->query("DELETE FROM tax_household WHERE tax_household.fk_household_id = ".$id);
        $mysqli->query("DELETE FROM household WHERE household.household_id = ".$id); 
        
        header('Location: http://localhost/prikazNisha/unos_podataka_ajax.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Last Added Data</title>
        <?php require 'require/head.php';?>
    </head>
    <body>
    <?php require 'require/nav.php'?>
    <div class="container alert alert-primary" style="margin-top:30px">
        <h1 class="text-center">Newly Added Household</h1>
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
        <div class="form-group d-flex flex-row-reverse">
            <a href="http://localhost/prikazNisha/unos_podataka_ajax.php" 
               class="btn btn-success btn-sm" 
               style="width:70px" >OK</a>
            <a href="http://localhost/prikazNisha/edit_unosa.php" 
               class="btn btn-warning btn-sm" 
               style="margin-right:10px; width:70px" >Edit</a>
            <button type="button" 
                    class="btn btn-danger btn-sm" 
                    data-toggle="modal" 
                    data-target="#deleteModal" 
                    style="margin-right:10px; width:70px">Delete</button>
        <div>
        <div id="deleteModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Delete Entry?</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete entry?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-sm" 
                                data-dismiss="modal">Cancel</button>
                        <form method='post' onSubmit="return confirm">
                        <input type="submit" class="btn btn-danger btn-sm" 
                               style="margin-right:10px; width:70px" 
                               name="delete" value="Delete">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require 'require/jquery.php' ?>
    </body>
</html>