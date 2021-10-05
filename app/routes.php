<?php


$router-> get('', 'PagesController@home');
$router-> get('home', 'PagesController@home');
$router-> get('inputform', 'HouseholdsController@new');
$router-> get('browsehouseholds', 'PagesController@browsehouseholds');
$router-> get('lastadded', 'PagesController@lastadded');
$router-> get('householdlist', 'HouseholdsController@index');

$router-> get('household', 'HouseholdsController@show');

$router-> get('edit', 'HouseholdsController@edit');


$router-> get('users', 'UsersController@index');

$router-> post('browsehouseholds', 'HouseholdsController@show');

$router-> post('edithousehold', 'HouseholdsController@update');

$router-> post('delete', 'HouseholdsController@destroy');

$router-> post('insert', 'HouseholdsController@create');

