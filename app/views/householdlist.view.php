<!DOCTYPE html>
<html>
    <head>
        <title>All Households</title>
        <?php require 'partials/head.php';?>
    </head>
    <body>
        <?php require ('partials/nav.php'); ?>
        <div class="container">
        <form method='get' action="household" >
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="income" > Set max income</label>
                </div>
                <input type="number" class="form-control" id="choose_id" name="id" >
                    
                <div class="input-group-append">
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                </div>
            </div>
        </form>
            <table class='table table-striped'>
                <tr>
                <th> Location
                <th> House Nu
                <th> Archive Code
                <th> Page Nu
                <th> Name
                <th> Surname
                <th> Status
                <?php foreach ($households as $member): ?>
                    
                    <tr>
                   
                    <td> <a href=<?= 'household?id=' . $member->id?>><?= $member->location ?> </a>
                    <td><?= $member->number ?>
                    <td><?= $member->archive_code ?>
                    <td><?= $member->page ?>
                    <td><?= $member->member_forname ?>
                    <td><?= $member->member_surname ?>
                    <td><?= $member->member_type .'/'. $member->member_type_en ?>
                   
                <?php endforeach; ?>
            </table>
        </div>
    </body>
</html>