<!DOCTYPE html>
<html>
    <head>
        <title>Filter Households</title>
        <?php require 'partials/head.php';?>
    </head>
    <body>
        <?php require ('partials/nav.php'); ?>
        <div class="container mt-4">
        <form method='get' action="test" >
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" name="location-check" id="location-check">
            <label class="form-check-label" for="location-check">
                Filter by Location
            </label>
        </div>
        <p class="mt-4">Press control to select multiple locations</p>
            <?php foreach($livestock as $stock) : ?>
                <div class="form-check">
            <input class="form-check-input" type="checkbox" 
            value="<?= $stock->livestock_id ?>" name="livestock-<?= $stock->livestock_id ?>" 
            id="livestock-<?= $stock->livestock_id ?>">
            <label class="form-check-label" for="livestock-<?= $stock->livestock_id ?>">
                <?= "$stock->type/$stock->type_en" ?>
            </label>
        </div>
    
            <?php endforeach; ?>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            
        </form>
            
        </div>
    </body>
</html>