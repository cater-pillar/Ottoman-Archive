<?php


$router-> get('', 'PagesController@home');
$router-> get('home', 'PagesController@home');
$router-> get('inputform', 'PagesController@inputform');
$router-> get('browsehouseholds', 'PagesController@browsehouseholds');
$router-> get('lastadded', 'PagesController@lastadded');
$router-> get('householdlist', 'PagesController@householdlist');

$router-> get('household', 'HouseholdsController@display');

$router-> get('edit', 'HouseholdsController@edit');


$router-> get('users', 'UsersController@index');

$router-> post('browsehouseholds', 'HouseholdsController@display');

$router-> post('edithousehold', 'HouseholdsController@editHousehold');

$router-> post('delete', 'HouseholdsController@delete');

$router-> post('insert', 'HouseholdsController@insert');

