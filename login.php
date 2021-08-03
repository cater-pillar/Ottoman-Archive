<?php 
    session_start();

    require 'require/conn.php';

    if (isset($_POST['submitadmin'])) {
        header('Location : http://localhost/prikazNisha');
    };

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Unos podataka u bazu</title>
        <?php require 'require/head.php';?>
        
    </head>
    <body>
    <?php require 'require/nav.php'?>
    <div class="container alert alert-primary" 
         style="margin-top: 30px; margin-bottom: 30px">
        <h1 class="page-header" >Log In</h1>
        <form method="POST" action="unos_podataka_ajax.php" >
        <div class='form-group'>
            <input class="form-control" type='text' placeholder='username' name='uid'>
            <input class="form-control" type='text' placeholder='password' name='pwd'>
            <input class="btn btn-success btn-sm" type="submit" name="submitadmin" value="Submit" >
        </div>
        <?php if( isset($_GET['error']) and $_GET['error'] == 'nologin'): ?>
        <div class='container alert alert-warning'>
        <p>You are not logged in!</p>
        </div>
        <?php endif; ?>
        <?php if(isset($_GET['error']) and $_GET['error'] == 'incorrect'): ?>
        <div class='container alert alert-warning'>
        <p>Incorrect username or password!</p>
        </div>
        <?php endif; ?>
        </form>