<?php

session_start();

require 'require/conn.php';

require 'require/basic_queries.php';


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Input Form</title>
        <?php require 'require/head.php';?>
        
    </head>
    <body>
    <?php require 'require/nav.php'?>
    <div class="container alert alert-primary" 
         style="margin-top: 30px; margin-bottom: 30px">
        <h1 class="page-header" >Add Household</h1>
        <form method="POST" action="require/add_household_function.php" >  
        <h2>Location</h2>
        <div class="form-group">
                
                <label for="location">Select Location Name:</label>
                    <select id="location" name="location" class="form-control">
                          <?php if (isset($_SESSION['location_id'])): ?>
                            <option value="<?php echo $_SESSION['location_id']?>" >
                            <?php echo $_SESSION['location_name'][0][0] ?>
                          <?php endif; ?>
                          <?php foreach ($result_location as $locations): ?>
                          <option value="<?php echo $locations['location_name_id']?>" >
                            <?php echo $locations['name'] ?>
                          </option>
                          <?php  endforeach; ?>
                    </select>
        </div>
        <h2>Household Member</h2>
        <div class="form-group">
            
            <label for="forname">Add Forname:</label>
            <input type="text" id="forname" name="forname" 
                   class="form-control" placeholder="Forname" >
        </div>
        <div class="form-group">  
            <label for="surname">Add Surname:</label>
            <input type="text" id="surname" name="surname" 
                   class="form-control" placeholder="Surname" >
        </div>
        <div class="form-group">   
            <label for="member_type">Select Household Member Position</label>
                <select id="member_type" name="member_type" class="form-control">
                    <?php foreach ($result_household as $members): ?>
                        <option value="<?php echo $members['household_member_type_id']?>" >
                          <?php echo $members['type'] .'/'. $members['type_en'] ?>
                        </option>
                    <?php  endforeach; ?>
                </select>
        </div>
        <div class="form-group">    
            <label for="household_number">Add Household Number:</label>
            <input type="number" id="household_number" name="household_number" 
                   class="form-control" placeholder="Household Number" required>
        </div>
        <div class="form-group">   
            <label for="household_notes">Notes:</label>
            <textarea id="household_notes" name="household_notes" 
                      class="form-control" placeholder="additional notes..." >
            </textarea>
        </div>
        <h2>Occupation</h2>
        <div id="occupation-div">
            
        </div>
        <div class="form-group">    
            <table class="table ">
                <tr>
                    <td>
                        add another occupation
                    </td>
                    <td>
                        remove last occupation 
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" 
                                id="occupation-button">+</button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" 
                                id="remove-occupation">X</button>
                    </td>
                </tr>
            </table>  
        </div>
        <h2>Taxes</h2>
        <div id="taxes-div">
            
        </div>
        <div class="form-group">
        <table class="table">
                <tr>
                    <td>
                        add another tax
                    </td>
                    <td>
                        remove last tax 
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" 
                                id="taxes-button">+</button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" 
                                id="remove-taxes">X</button>
                    </td>
                </tr>
            </table>    
        </div>
        <h2>Land</h2>
        <div id="land-div">
            
        </div>
        <div class="form-group">        
        <table class="table">
                <tr>
                    <td>
                        add another land
                    </td>
                    <td>
                        remove last land 
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" 
                                id="land-button">+</button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" 
                                id="remove-land">X</button>
                    </td>
                </tr>
            </table>  
        </div>      
        <h2>Real Estate</h2>
        <div id="real-estate-div">
            
        </div>
        <div class="form-group">        
        <table class="table">
                <tr>
                    <td>
                        add another real estate
                    </td>
                    <td>
                        remove last real estate 
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" 
                                id="real-estate-button">+</button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" 
                                id="remove-real-estate">X</button>
                    </td>
                </tr>
            </table> 
        </div>
        <h2>Livestock</h2>
        <div id="livestock-div">

        </div>
        <div class="form-group">        
        <table class="table">
                <tr>
                    <td>
                        add another livestock
                    </td>
                    <td>
                        remove last livestock 
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" id="livestock-button">+</button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" id="remove-livestock">X</button>
                    </td>
                </tr>
            </table> 
        </div>
        <div class="form-group d-flex flex-row-reverse">
            
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal">Submit</button>
        </div>
        <div id="createModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Create Entry?</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to create entry?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Cancel</button>
                        <form method='post' onSubmit="return confirm">
                        <input class="btn btn-success btn-sm" type="submit" name="submit" value="Submit" >
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <?php require 'require/jquery.php' ?>
    <script src="script.js"></script>
    </body>
</html>


