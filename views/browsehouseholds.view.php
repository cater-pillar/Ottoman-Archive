<!DOCTYPE html>
<html>
    <head>
        <title>Browse Households</title>
        <?php require 'partials/head.php';?>
    </head>
    <body>
        <?php require 'partials/nav.php'?>
    <div class="container alert alert-primary" style="margin-top:30px">
        <form method='get' action="household" >
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="choose_id" > Choose Household ID</label>
                </div>
                <select class="custom-select" id="choose_id" name="id" >
                    <?php foreach ($ids as $id):?>
                        <option  value="<?= $id?>">
                            <?= $id?>
                        </option>
                    <?php endforeach?>
                </select>
                <div class="input-group-append">
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                </div>
            </div>
        </form>
        <?php if (isset($_POST['submit'])): ?>
        <?php if ($household != []): ?>
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
                <td><?= $household->location ?>
                <td><?= $household->id ?>
                <td><?= $household->number ?>
                <td><?= $household->member_forname ?>
                <td><?= $household->member_surname ?>
                <td><?= $household->member_type .'/'. $household->member_type_en ?>
        <?php endif?>
            <?php if ($household->notes != ''): ?>
            <tr>
                <th colspan="6">Notes
            <tr>
                <td colspan="6"><?= $household->notes ?>
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
                <td><?= $occupation->name .'/'. $occupation->name_en?>
                <td><?= $occupation->income?>
                <td><?= $occupation->type?>
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
                <td><?= $tax->type .'/'. $tax->type_en?>
                <td><?= $tax->amount?>
                <td><?= $tax->is_exused?>
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
                <td><?= $land->type .'/'. $land->type_en?>
                <td><?= $land->area?>
                <td><?= $land->income?>
                <td><?= $land->payed_rent?>
                <td><?= $land->location?>
                <td><?= $land->description?> 
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
                <td><?= $real_estate->type .'/'. $real_estate->type_en?>
                <td><?= $real_estate->quantity?>
                <td><?= $real_estate->income?>
                <td><?= $real_estate->location?>
                <td><?= $real_estate->description?> 
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
                <td><?= $livestock->type .'/'. $livestock->type_en?>
                <td><?= $livestock->quantity?>
                <td><?= $livestock->income?>
        <?php endforeach; ?>
        </table>
        
        <?php endif; ?>
        <table class="table table-striped">
            <tr>
            <th>Total Income
            <th>Total Tax
            <tr>
            <td><?= $household->totalIncome(); ?>
            <td><?= $household->totalTax(); ?>
        </table>
        <?php endif; ?>
    </div>
        <?php require 'partials/jquery.php' ?>
    </body>
</html>