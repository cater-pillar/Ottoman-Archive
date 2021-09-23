<!DOCTYPE html>
<html>
    <head>
        <title>All Households</title>
        <?php require 'partials/head.php';?>
    </head>
    <body>
        <?php require ('partials/nav.php'); ?>
        <div class="container">
            <table class='table table-striped'>
                <tr>
                <th> Location
                <th> House Nu
                <th> Name
                <th> Surname
                <th> Status
                <?php foreach ($households as $member): ?>
                    
                    <tr>
                   
                    <td> <a href=<?= 'household?id=' . $member->id?>><?= $member->location ?> </a>
                    <td><?= $member->number ?>
                    <td><?= $member->member_forname ?>
                    <td><?= $member->member_surname ?>
                    <td><?= $member->member_type .'/'. $member->member_type_en ?>
                   
                <?php endforeach; ?>
            </table>
        </div>
    </body>
</html>