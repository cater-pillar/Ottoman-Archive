<?php

/* require 'vendor/autoload.php'; */



require 'core/database/Connection.php';

require 'core/database/QueryBuilder.php';

require 'core/Router.php';

require 'core/Request.php';

require 'core/App.php';

require 'core/bootstrap.php';

require 'models/Occupation.php';
require 'models/Tax.php';
require 'models/Land.php';
require 'models/RealEstate.php';
require 'models/Livestock.php';
require 'models/Household.php';


require 'controllers/PagesController.php';

require 'controllers/HouseholdController.php';

Router::load('routes.php')
        ->direct(Request::uri(), 
                 Request::method()
                );
