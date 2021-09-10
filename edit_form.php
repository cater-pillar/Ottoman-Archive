<?php

    require 'require/conn.php';
    

        
  


    $id = $_GET['id'];

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
        <form method="POST" action=<?php echo 'require/edit_function.php?src='.$_GET['src'].'&id='.$id ?>>
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
                            <?php echo $result_new_household[0]['name'] ?>
                        </option>
                          <?php foreach ($result_location as $locations): ?>
                          <option value="<?php echo $locations['location_id']?>" >
                            <?php echo $locations['name'] ?>
                          </option>
                          <?php  endforeach; ?>
                    </select>
                <td><div><?php echo $result_new_household[0]['household_id'] ?></div>
                <td>
                    <input type="number" id="household_number" 
                           class="form-control" name="household_number" 
                           placeholder=<?php echo $result_new_household[0]['household_number'] ?>
                           value=<?php echo $result_new_household[0]['household_number'] ?>>
                <td>
                    <input type="text" id="forname" name="forname" 
                           class="form-control" 
                           placeholder=<?php echo $result_new_household[0]['member_forname'] ?>
                           value=<?php echo $result_new_household[0]['member_forname'] ?> >
                <td>
                    <input type="text" id="surname" name="surname" 
                           class="form-control" 
                           placeholder=<?php echo $result_new_household[0]['member_surname'] ?>
                           value=<?php echo $result_new_household[0]['member_surname'] ?> >
                <td>
                    <select id="member_type" name="member_type" 
                            class="form-control">
                        <option value="" disabled selected>
                            <?php echo $result_new_household[0]['type'] .'/'.$result_new_household[0]['type_en'] ?>
                        </option>
                    <?php foreach ($result_household as $members): ?>
                        <option value="<?php echo $members['household_member_type_id']?>" >
                    <?php echo $members['type'] .'/'. $members['type_en'] ?>
                        </option>
                    <?php  endforeach; ?>
                    </select>
            <?php if ($result_new_household[0]['notes'] != ''): ?>
            <tr>
                <th colspan="6">Notes
            <tr>
                <td colspan="6">
                <textarea   id="household_notes" 
                            name="household_notes" 
                            class="form-control" 
                            value=<?php echo $result_new_household[0]['notes'] ?>>
                    <?php echo $result_new_household[0]['notes'] ?>
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
                            <?php echo $result['name'] .'/'. $result['name_en']?> 
                        </option>
                          <?php foreach ($result_occupation as $occupations): ?>
                          <option value="<?php echo $occupations['occupation_id']?>" >
                            <?php echo $occupations['name'] .'/'. $occupations['name_en'] ?>
                          </option>
                          <?php  endforeach; ?>
                    </select>
                <td><input type="number" id=<?php echo "occupation_income".$i_occ ?> 
                           name=<?php echo "occupation_income".$i_occ ?> 
                           class="form-control" 
                           placeholder=<?php echo $result['income']?>
                           value=<?php echo $result['income']?> >
                <td><?php echo $result['type']?>
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
                            <?php echo $result['type'] .'/'. $result['type_en']?> 
                         </option>
                          <?php foreach ($result_tax as $tax): ?>
                            <option value="<?php echo $tax['tax_id']?>" >
                                <?php echo $tax['type'] .'/'.  $tax['type_en'] ?>
                            </option>
                          <?php  endforeach; ?>
                    </select>
                <td><input type="number" 
                           id=<?php echo "tax_amount".$i_tax ?> 
                           name=<?php echo "tax_amount".$i_tax ?> 
                           class="form-control" 
                           placeholder=<?php echo $result['amount']?>
                           value=<?php echo $result['amount']?> >
                <td><?php echo $result['is_exused']?>
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
                            <?php echo $result['type'] .'/'. $result['type_en']?> 
                         </option>
                          <?php foreach ($result_land as $land): ?>
                          <option value="<?php echo $land['land_id']?>" >
                            <?php echo $land['type'] .'/'. $land['type_en'] ?>
                          </option>
                          <?php  endforeach; ?>
                    </select>
                <td><input type="number" 
                           id=<?php echo "land_area".$i_land ?> 
                           name=<?php echo "land_area".$i_land ?> 
                           class="form-control" 
                           placeholder=<?php echo $result['area']?>
                           value=<?php echo $result['area']?> >
                <td><input type="number" 
                           id=<?php echo "land_income".$i_land ?> 
                           name=<?php echo "land_income".$i_land ?> 
                           class="form-control" 
                           placeholder=<?php echo $result['income']?>
                           value=<?php echo $result['income']?> >
                <td><input type="number" 
                           id=<?php echo "land_rent".$i_land ?> 
                           name=<?php echo "land_rent".$i_land ?> 
                           class="form-control" 
                           placeholder=<?php echo $result['payed_rent']?>
                           value=<?php echo $result['payed_rent']?> >
                <td><textarea id=<?php echo "land_location".$i_land ?> 
                              name=<?php echo "land_location".$i_land ?>
                              class="form-control" 
                              value=<?php echo $result['location']?>>
                                <?php echo $result['location']?></textarea> 
                <td><textarea id=<?php echo "land_description".$i_land ?> 
                              name=<?php echo "land_description".$i_land ?> 
                              class="form-control" 
                              value=<?php echo $result['description']?>>
                                <?php echo $result['description']?></textarea>
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
                            <?php echo $result['type'] .'/'. $result['type_en']?> 
                         </option>
                          <?php foreach ($result_realestate as $real_estate): ?>
                          <option value="<?php echo $real_estate['real_estate_id']?>" >
                            <?php echo $real_estate['type'] .'/'. $real_estate['type_en']?>
                          </option>
                          <?php  endforeach; ?>
                    </select>
                <td><input type="number" 
                           id=<?php echo "real_estate_quantity".$i_estate ?> 
                           name=<?php echo "real_estate_quantity".$i_estate ?> 
                           class="form-control" 
                           placeholder=<?php echo $result['quantity']?>
                           value=<?php echo $result['quantity']?> >
                <td><input type="number" 
                           id=<?php echo "real_estate_income".$i_estate ?> 
                           name=<?php echo "real_estate_income".$i_estate ?> 
                           class="form-control" 
                           placeholder=<?php echo $result['rent_income']?>
                           value=<?php echo $result['rent_income']?> >
                <td><textarea id=<?php echo "real_estate_location".$i_estate ?> 
                              name=<?php echo "real_estate_location".$i_estate ?> 
                              class="form-control" 
                              value=<?php echo $result['location']?>
                           ><?php echo $result['location']?></textarea>
                <td><textarea id=<?php echo "real_estate_description".$i_estate ?> 
                              name=<?php echo "real_estate_description".$i_estate ?> 
                              class="form-control" 
                              value=<?php echo $result['description']?>
                           ><?php echo $result['description']?></textarea> 
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
                            <?php echo $result['type'] .'/'. $result['type_en']?> 
                         </option>
                          <?php foreach ($result_livestock as $livestock): ?>
                          <option value="<?php echo $livestock['livestock_id']?>" >
                            <?php echo $livestock['type'] .'/'. $livestock['type_en'] ?>
                          </option>
                          <?php  endforeach; ?>
                    </select>
                <td><input type="number" 
                           id=<?php echo "livestock_quantity".$i_livestock ?> 
                           name=<?php echo "livestock_quantity".$i_livestock ?> 
                           class="form-control" 
                           placeholder=<?php echo $result['quantity']?>
                           value=<?php echo $result['quantity']?> >
                <td><input type="number" 
                           id=<?php echo "livestock_income".$i_livestock ?> 
                           name=<?php echo "livestock_income".$i_livestock ?>  
                           class="form-control" 
                           placeholder=<?php echo $result['income']?>
                           value=<?php echo $result['income']?> >
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