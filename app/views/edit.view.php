<?php
    $id = $_GET['id'];

    $i_occ = 1;
    $i_tax = 1;
    $i_land = 1;
    $i_estate = 1;
    $i_livestock = 1;


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit Household</title>
        <?php require 'partials/head.php';?>
    </head>
    <body>
    <?php require 'partials/nav.php'?>
    <div class="container alert alert-primary" style="margin-top:30px">
        <h1 class="text-center">Newly Added Household</h1>
        <form method="POST" action=<?='edithousehold?id='. $id?>>
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
                            <?= $household->location ?>
                        </option>
                          <?php foreach ($locations as $location): ?>
                          <option value=<?= $location->location_name_id?> >
                            <?= $location->name ?>
                          </option>
                          <?php  endforeach; ?>
                    </select>
                <td><div><?= $household->id ?></div>
                <td>
                    <input type="number" id="household_number" 
                           class="form-control" name="household_number" 
                           placeholder=<?= $household->number ?>
                           value=<?= $household->number ?>>
                <td>
                    <input type="text" id="forname" name="forname" 
                           class="form-control" 
                           placeholder="<?= $household->member_forname ?>"
                           value="<?=$household->member_forname ?>" >
                <td>
                    <input type="text" id="surname" name="surname" 
                           class="form-control" 
                           placeholder="<?=$household->member_surname ?>"
                           value="<?=$household->member_surname ?>" >
                <td>
                    <select id="member_type" name="member_type" 
                            class="form-control">
                        <option value="" disabled selected>
                            <?=$household->member_type .'/'.$household->member_type_en ?>
                        </option>
                    <?php foreach ($member_types as $members): ?>
                        <option value="<?= $members->household_member_type_id?>" >
                    <?= $members->type .'/'. $members->type_en ?>
                        </option>
                    <?php  endforeach; ?>
                    </select>
            <?php if ($household->notes != ''): ?>
            <tr>
                <th colspan="6">Notes
            <tr>
                <td colspan="6">
                <textarea   id="household_notes" 
                            name="household_notes" 
                            class="form-control" 
                            value=<?=$household->notes ?>>
                    <?=$household->notes ?>
                </textarea>
            <?php endif; ?>
        </table>
        <?php if ($household->occupations != []): ?>
        <h2 class="text-center">Occupation(s)</h1>
        <table class="table table-striped">
            <tr>
                <th>Name
                <th>Income
                <th>Proficiency
            <?php foreach ($household->occupations as $occupation): ?>
            <tr>
                <td> <select id=<?= "occupation".$i_occ ?> 
                             name=<?= "occupation".$i_occ ?> 
                             class="form-control">
                         <option value="" disabled selected> 
                            <?= $occupation->name .'/'. $occupation->name_en ?> 
                        </option>
                          <?php foreach ($occupations as $occ): ?>
                          <option value="<?= $occ->occupation_id?>" >
                            <?= $occ->name .'/'. $occ->name_en ?>
                          </option>
                          <?php  endforeach; ?>
                    </select>
                <td><input type="number" id=<?= "occupation_income".$i_occ ?> 
                           name=<?= "occupation_income".$i_occ ?> 
                           class="form-control" 
                           placeholder=<?= $occupation->income?>
                           value=<?= $occupation->income?> >
                <td><?= $occupation->type?>
                <?php $i_occ++ ?>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
        <?php if ($household->taxes != []): ?>
        <h2 class="text-center">Tax(es)</h1>
        <table class="table table-striped">
            <tr>
                <th>Type
                <th>Amount
                <th>is exused
                <?php foreach ($household->taxes as $tax): ?>
            <tr>
                <td><select id=<?= "tax_type".$i_tax ?> 
                            name=<?= "tax_type".$i_tax ?> 
                            class="form-control">
                         <option value="" disabled selected> 
                            <?= $tax->type .'/'. $tax->type_en?> 
                         </option>
                          <?php foreach ($taxes as $tx): ?>
                            <option value="<?= $tx->tax_id?>" >
                                <?= $tx->type .'/'.  $tx->type_en ?>
                            </option>
                          <?php  endforeach; ?>
                    </select>
                <td><input type="number" 
                           id=<?= "tax_amount".$i_tax ?> 
                           name=<?= "tax_amount".$i_tax ?> 
                           class="form-control" 
                           placeholder=<?= $tax->amount?>
                           value=<?= $tax->amount?> >
                <td><?= $tax->is_exused?>
                <?php $i_tax++ ?>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
        <?php if ($household->lands != []): ?>
        <h2 class="text-center">Land</h1>
        <table class="table table-striped">
            <tr>
                <th>Type
                <th>Area
                <th>Income
                <th>Rent
                <th>Location
                <th>Description
        <?php foreach ($household->lands as $land): ?>
            <tr>
                <td><select id=<?= "land_type".$i_land ?> 
                            name=<?= "land_type".$i_land ?> 
                            class="form-control">
                         <option value="" disabled selected> 
                            <?= $land->type .'/'. $land->type_en?> 
                         </option>
                          <?php foreach ($lands as $lnd): ?>
                          <option value="<?= $lnd->land_id?>" >
                            <?= $lnd->type .'/'. $lnd->type_en ?>
                          </option>
                          <?php  endforeach; ?>
                    </select>
                <td><input type="number" 
                           id=<?= "land_area".$i_land ?> 
                           name=<?= "land_area".$i_land ?> 
                           class="form-control" 
                           placeholder=<?= $land->area?>
                           value=<?= $land->area?> >
                <td><input type="number" 
                           id=<?= "land_income".$i_land ?> 
                           name=<?= "land_income".$i_land ?> 
                           class="form-control" 
                           placeholder=<?= $land->income?>
                           value=<?= $land->income?> >
                <td><input type="number" 
                           id=<?= "land_rent".$i_land ?> 
                           name=<?= "land_rent".$i_land ?> 
                           class="form-control" 
                           placeholder=<?= $land->payed_rent?>
                           value=<?= $land->payed_rent?> >
                <td><textarea id=<?= "land_location".$i_land ?> 
                              name=<?= "land_location".$i_land ?>
                              class="form-control" 
                              value=<?= $land->location?>>
                                <?= $land->location?></textarea> 
                <td><textarea id=<?= "land_description".$i_land ?> 
                              name=<?= "land_description".$i_land ?> 
                              class="form-control" 
                              value=<?= $land->description?>>
                                <?= $land->description?></textarea>
                <?php $i_land++ ?>
        <?php endforeach; ?>
        </table>
        <?php endif; ?>
        <?php if ($household->real_estates != []): ?>
        <h2 class="text-center">Real Estate</h1>
        <table class="table table-striped">
            <tr>
                <th>Type
                <th>Quantity
                <th>Income
                <th>Location
                <th>Description 
        <?php foreach ($household->real_estates as $real_estate): ?>
            <tr>
                <td><select id=<?= "real_estate_type".$i_estate ?>
                            name=<?= "real_estate_type".$i_estate ?> 
                            class="form-control">
                         <option value="" disabled selected> 
                            <?= $real_estate->type .'/'. $real_estate->type_en?> 
                         </option>
                          <?php foreach ($realestates as $realestate): ?>
                          <option value="<?= $realestate->real_estate_id?>" >
                            <?= $realestate->type .'/'. $realestate->type_en?>
                          </option>
                          <?php  endforeach; ?>
                    </select>
                <td><input type="number" 
                           id=<?= "real_estate_quantity".$i_estate ?> 
                           name=<?= "real_estate_quantity".$i_estate ?> 
                           class="form-control" 
                           placeholder=<?= $real_estate->quantity?>
                           value=<?= $real_estate->quantity?> >
                <td><input type="number" 
                           id=<?= "real_estate_income".$i_estate ?> 
                           name=<?= "real_estate_income".$i_estate ?> 
                           class="form-control" 
                           placeholder=<?= $real_estate->income?>
                           value=<?= $real_estate->income?> >
                <td><textarea id=<?= "real_estate_location".$i_estate ?> 
                              name=<?= "real_estate_location".$i_estate ?> 
                              class="form-control" 
                              value=<?= $real_estate->location?>
                           ><?= $real_estate->location?></textarea>
                <td><textarea id=<?= "real_estate_description".$i_estate ?> 
                              name=<?= "real_estate_description".$i_estate ?> 
                              class="form-control" 
                              value=<?= $real_estate->description?>
                           ><?= $real_estate->description?></textarea> 
                <?php $i_estate++ ?>
        <?php endforeach; ?>
        </table>
        <?php endif; ?>
        <?php if ($household->livestock != []): ?>
        <h2 class="text-center">Livestock</h1>
        <table class="table table-striped">
            <tr>
                <th>Type
                <th>Quantity
                <th>Income
        <?php foreach ($household->livestock as $livestock): ?>
            <tr>
                <td><select id=<?= "livestock_type".$i_livestock ?>
                            name=<?= "livestock_type".$i_livestock ?> 
                            class="form-control">
                         <option value="" disabled selected> 
                            <?= $livestock->type .'/'. $livestock->type_en?> 
                         </option>
                          <?php foreach ($livestocks as $stock): ?>
                          <option value="<?= $stock->livestock_id?>" >
                            <?= $stock->type .'/'. $stock->type_en ?>
                          </option>
                          <?php  endforeach; ?>
                    </select>
                <td><input type="number" 
                           id=<?= "livestock_quantity".$i_livestock ?> 
                           name=<?= "livestock_quantity".$i_livestock ?> 
                           class="form-control" 
                           placeholder=<?= $livestock->quantity?>
                           value=<?= $livestock->quantity?> >
                <td><input type="number" 
                           id=<?= "livestock_income".$i_livestock ?> 
                           name=<?= "livestock_income".$i_livestock ?>  
                           class="form-control" 
                           placeholder=<?= $livestock->income?>
                           value=<?= $livestock->income?> >
                <?php $i_livestock++ ?>
        <?php endforeach; ?>
        </table>
        <?php endif; ?>
        <div class="form-group d-flex flex-row-reverse">
        <input type="submit" name="submit" value="Submit" class="btn btn-success btn-sm" 
                style="width:70px" >
        <a href="<?= 'household?id='.$id ?>" class="btn btn-warning btn-sm" 
                style="margin-right:10px; width:70px">Cancel</a>
        <div>
        </form>
    </div>
    <?php require 'partials/jquery.php' ?>
    </body>
</html>