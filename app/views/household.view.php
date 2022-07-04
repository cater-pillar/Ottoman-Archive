<!DOCTYPE html>
<html>
    <head>
        <title>Single Household</title>
        <?php require 'partials/head.php';?>
    </head>
    <body>
        <?php require 'partials/nav.php'?>
    <div class="container alert alert-primary" style="margin-top:30px">
        
        <?php if ($household != []): ?>
        <h1 class="text-center">Household</h1>
        <table class="table table-striped">
            <tr>
                <th>Location
                <th>Archive Code
                <th>Page No
                <th>House No
                <th>Forname
                <th>Surname
                <th>Position 
            <tr>
                <td><?= $household->location ?>
                <td><?= $household->archive_code ?>
                <td><?= $household->page ?>
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
        <div class='d-flex justify-content-between'>
            <?php if ($current_id_index == 0): ?>
            <a href='#' 
               class='btn btn-primary disabled'>  < </a>
            <?php else: ?>
            <a href=<?= 'household?id='.$ids[$current_id_index- 1] ?> 
               class='btn btn-primary'>  < </a>
            <?php endif ?>
               <div>
               <button
               class="btn btn-danger" 
               data-toggle="modal" 
               data-target="#deleteModal" 
               style="margin-right:10px; width:70px" >Delete</button>
               <a href=<?= "edit?id=".$_GET['id'] ?>
               class="btn btn-warning" 
               style="margin-right:10px; width:70px" >Edit</a>
                </div>
            <?php if (count($ids) === ($current_id_index+1)): ?>
                <a href='#' 
               class='btn btn-primary disabled'>  > </a>
            <?php else: ?>
            <a href=<?= 'household?id='.$ids[$current_id_index + 1] ?> 
               class='btn btn-primary'> > </a> 
            <?php endif ?>
        </div>
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
                        <form method='post' 
                              action='<?='delete?id='.$ids[$current_id_index]?>' 
                              onSubmit="return confirm">
                        <input type="submit" class="btn btn-danger btn-sm" 
                               style="margin-right:10px; width:70px" 
                               name="delete" value="Delete">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php require 'partials/jquery.php' ?>
    </body>
</html>