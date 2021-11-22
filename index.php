<?php

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require 'vendor/autoload.php';

require 'core/bootstrap.php';



use App\Core\{Router, Request};

Router::load('app/routes.php')
        ->direct(Request::uri(), 
                 Request::method()
                );
