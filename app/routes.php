<?php


$router-> get('', 'PagesController@home');
$router-> get('home', 'PagesController@home');
$router-> get('inputform', 'HouseholdsController@new');
$router-> get('browsehouseholds', 'PagesController@browsehouseholds');
$router-> get('filterhouseholds', 'PagesController@filterhouseholds'); // OVAJ RADI ALI JE NOV

$router-> get('lastadded', 'PagesController@lastadded');
$router-> get('householdlist', 'HouseholdsController@index');

$router-> get('household', 'HouseholdsController@show');

$router-> get('test', 'PagesController@test'); // ZASTO NE RADI???

$router-> get('edit', 'HouseholdsController@edit');


$router-> get('users', 'UsersController@index');

$router-> post('browsehouseholds', 'HouseholdsController@show');

$router-> post('edithousehold', 'HouseholdsController@update');

$router-> post('delete', 'HouseholdsController@destroy');

$router-> post('insert', 'HouseholdsController@create');



$router-> get('occupation', 'JsonController@occupationIndex');
$router-> get('occupation/top', 'JsonController@occupationTop');
$router-> get('occupation/bottom', 'JsonController@occupationBottom');
$router-> get('occupation/show', 'JsonController@occupationShow');
$router-> get('tax', 'JsonController@taxIndex');
$router-> get('tax/show', 'JsonController@taxShow');
$router-> get('land', 'JsonController@landIndex');
$router-> get('land/show', 'JsonController@landShow');
$router-> get('realestate', 'JsonController@realestateIndex');
$router-> get('realestate/show', 'JsonController@realestateShow');
$router-> get('livestock', 'JsonController@livestockIndex');
$router-> get('livestock/show', 'JsonController@livestockShow');
$router-> get('location', 'JsonController@locationIndex');
$router-> get('location/show', 'JsonController@locationShow');
$router-> get('location/city', 'JsonController@locationCity');
$router-> get('household/json', 'JsonController@householdIndex');
$router-> get('household/json/show', 'JsonController@householdShow');



