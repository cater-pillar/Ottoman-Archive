<?php

    require 'require/conn.php';

    $max_id = $mysqli -> query('SELECT MAX(household_id) FROM household') -> fetch_all();

    $household_id = $max_id[0][0];

    $id = $household_id;

    $i_occ = 1;
    $i_tax = 1;
    $i_land = 1;
    $i_estate = 1;
    $i_livestock = 1;

    require 'require/prep_statements.php';

    require 'require/basic_queries.php';


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit Household</title>
        <?php require 'require/head.php';?>
    </head>
    <body>
    <?php require 'require/nav.php'?>
    <div class="container alert alert-primary" style="margin-top:30px">
        <h1 class="text-center">Newly Added Household</h1>
        <form method="POST" action="require/edit_function.php">
        <table class="table table-striped">
            <tr>
                <th>Location
                <th>ID
                <th><label for="household_number">Number</label>
                <th>Forname
                <th>Surname
                <th>Position 
            <tr>
                <td>
                    <select id="location" name="location" class="form-control">
                         <option value="" disabled selected>
                            <?php echo $result_new_household[0][0] ?>
                        </option>
                          <?php foreach ($result_location as $locations): ?>
                          <option value="<?php echo $locations[1]?>" >
                            <?php echo $locations[0] ?>
                          </option>
                          <?php  endforeach; ?>
                    </select>
                <td><div><?php echo $result_new_household[0][1] ?></div>
                <td>
                    <input type="number" id="household_number" 
                           class="form-control" name="household_number" 
                           placeholder=<?php echo $result_new_household[0][2] ?>
                           value=<?php echo $result_new_household[0][2] ?>>
                <td>
                    <input type="text" id="forname" name="forname" 
                           class="form-control" 
                           placeholder=<?php echo $result_new_household[0][3] ?>
                           value=<?php echo $result_new_household[0][3] ?> >
                <td>
                    <input type="text" id="surname" name="surname" 
                           class="form-control" 
                           placeholder=<?php echo $result_new_household[0][4] ?>
                           value=<?php echo $result_new_household[0][4] ?> >
                <td>
                    <select id="member_type" name="member_type" 
                            class="form-control">
                        <option value="" disabled selected>
                            <?php echo $result_new_household[0][5] ?>
                        </option>
                    <?php foreach ($result_household as $members): ?>
                        <option value="<?php echo $members[0]?>" >
                    <?php echo $members[1] ?>
                        </option>
                    <?php  endforeach; ?>
                    </select>
            <?php if ($result_new_household[0][6] != ''): ?>
            <tr>
                <th colspan="6">Notes
            <tr>
                <td colspan="6">
                <textarea   id="household_notes" 
                            name="household_notes" 
                            class="form-control" 
                            value=<?php echo $result_new_household[0][6] ?>>
                    <?php echo $result_new_household[0][6] ?>
                </textarea>
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
                <td> <select id=<?php echo "occupation".$i_occ ?> 
                             name=<?php echo "occupation".$i_occ ?> 
                             class="form-control">
                         <option value="" disabled selected> 
                            <?php echo $result[0]?> 
                        </option>
                          <?php foreach ($result_occupation as $occupations): ?>
                          <option value="<?php echo $occupations[0]?>" >
                            <?php echo $occupations[1] ?>
                          </option>
                          <?php  endforeach; ?>
                    </select>
                <td><input type="number" id=<?php echo "occupation_income".$i_occ ?> 
                           name=<?php echo "occupation_income".$i_occ ?> 
                           class="form-control" 
                           placeholder=<?php echo $result[1]?>
                           value=<?php echo $result[1]?> >
                <td><?php echo $result[2]?>
                <?php $i_occ++ ?>
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
                <td><select id=<?php echo "tax_type".$i_tax ?> 
                            name=<?php echo "tax".$i_tax ?> 
                            class="form-control">
                         <option value="" disabled selected> 
                            <?php echo $result[0]?> 
                         </option>
                          <?php foreach ($result_tax as $tax): ?>
                            <option value="<?php echo $tax[0]?>" >
                                <?php echo $tax[1] ?>
                            </option>
                          <?php  endforeach; ?>
                    </select>
                <td><input type="number" 
                           id=<?php echo "tax_amount".$i_tax ?> 
                           name=<?php echo "tax_amount".$i_tax ?> 
                           class="form-control" 
                           placeholder=<?php echo $result[1]?>
                           value=<?php echo $result[1]?> >
                <td><?php echo $result[2]?>
                <?php $i_tax++ ?>
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
                <td><select id=<?php echo "land_type".$i_land ?> 
                            name=<?php echo "land_type".$i_land ?> 
                            class="form-control">
                         <option value="" disabled selected> 
                            <?php echo $result[0]?> 
                         </option>
                          <?php foreach ($result_land as $land): ?>
                          <option value="<?php echo $land[0]?>" >
                            <?php echo $land[1] ?>
                          </option>
                          <?php  endforeach; ?>
                    </select>
                <td><input type="number" 
                           id=<?php echo "land_area".$i_land ?> 
                           name=<?php echo "land_area".$i_land ?> 
                           class="form-control" 
                           placeholder=<?php echo $result[1]?>
                           value=<?php echo $result[1]?> >
                <td><input type="number" 
                           id=<?php echo "land_income".$i_land ?> 
                           name=<?php echo "land_income".$i_land ?> 
                           class="form-control" 
                           placeholder=<?php echo $result[2]?>
                           value=<?php echo $result[2]?> >
                <td><input type="number" 
                           id=<?php echo "land_rent".$i_land ?> 
                           name=<?php echo "land_rent".$i_land ?> 
                           class="form-control" 
                           placeholder=<?php echo $result[3]?>
                           value=<?php echo $result[3]?> >
                <td><textarea id=<?php echo "land_location".$i_land ?> 
                              name=<?php echo "land_location".$i_land ?>
                              class="form-control" 
                              value=<?php echo $result[4]?>>
                                <?php echo $result[4]?></textarea> 
                <td><textarea id=<?php echo "land_description".$i_land ?> 
                              name=<?php echo "land_description".$i_land ?> 
                              class="form-control" 
                              value=<?php echo $result[5]?>>
                                <?php echo $result[5]?></textarea>
                <?php $i_land++ ?>
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
                <td><select id=<?php echo "real_estate_type".$i_estate ?>
                            name=<?php echo "real_estate_type".$i_estate ?> 
                            class="form-control">
                         <option value="" disabled selected> 
                            <?php echo $result[0]?> 
                         </option>
                          <?php foreach ($result_realestate as $real_estate): ?>
                          <option value="<?php echo $real_estate[0]?>" >
                            <?php echo $real_estate[1] ?>
                          </option>
                          <?php  endforeach; ?>
                    </select>
                <td><input type="number" 
                           id=<?php echo "real_estate_quantity".$i_estate ?> 
                           name=<?php echo "real_estate_quantity".$i_estate ?> 
                           class="form-control" 
                           placeholder=<?php echo $result[1]?>
                           value=<?php echo $result[1]?> >
                <td><input type="number" 
                           id=<?php echo "real_estate_income".$i_estate ?> 
                           name=<?php echo "real_estate_income".$i_estate ?> 
                           class="form-control" 
                           placeholder=<?php echo $result[2]?>
                           value=<?php echo $result[2]?> >
                <td><textarea id=<?php echo "real_estate_location".$i_estate ?> 
                              name=<?php echo "real_estate_location".$i_estate ?> 
                              class="form-control" 
                           ><?php echo $result[3]?></textarea>
                <td><textarea id=<?php echo "real_estate_description".$i_estate ?> 
                              name=<?php echo "real_estate_description".$i_estate ?> 
                              class="form-control" 
                              value=<?php echo $result[4]?>
                           ><?php echo $result[4]?></textarea> 
                <?php $i_estate++ ?>
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
                <td><select id=<?php echo "livestock_type".$i_livestock ?>
                            name=<?php echo "livestock_type".$i_livestock ?> 
                            class="form-control">
                         <option value="" disabled selected> 
                            <?php echo $result[0]?> 
                         </option>
                          <?php foreach ($result_livestock as $livestock): ?>
                          <option value="<?php echo $livestock[0]?>" >
                            <?php echo $livestock[1] ?>
                          </option>
                          <?php  endforeach; ?>
                    </select>
                <td><input type="number" 
                           id=<?php echo "livestock_quantity".$i_livestock ?> 
                           name=<?php echo "livestock_quantity".$i_livestock ?> 
                           class="form-control" 
                           placeholder=<?php echo $result[1]?>
                           value=<?php echo $result[1]?> >
                <td><input type="number" 
                           id=<?php echo "livestock_income".$i_livestock ?> 
                           name=<?php echo "livestock_income".$i_livestock ?>  
                           class="form-control" 
                           placeholder=<?php echo $result[2]?>
                           value=<?php echo $result[2]?> >
                <?php $i_livestock++ ?>
        <?php endforeach; ?>
        </table>
        <?php endif; ?>
        <div class="form-group d-flex flex-row-reverse">
        <input type="submit" name="submit" value="Submit" class="btn btn-success btn-sm" 
                style="width:70px" >
        <a href="uspesno_dodato.php" class="btn btn-warning btn-sm" 
                style="margin-right:10px; width:70px">Cancel</a>
        <div>
        </form>
    </div>
    <?php require 'require/jquery.php' ?>
    </body>
</html>