<?php

namespace App\Controllers;

use App\Core\App;
use App\Models\{Household, Land, Livestock, Occupation, RealEstate, Tax};

class PagesController {

    

    public function home()
{
    $members = App::get('database')->count('household_id', 'household');
    $occupations = App::get('database')->count('fk_occupation_id', 'occupation');

    return view('index', ['members' => $members, 'occupations' => $occupations]);
}

    public function inputForm()
{
    $locations = App::get('database')->selectAll('location_name', 'name');
    $member_types = App::get('database')->selectAll('household_member_type', 'type');
    return view('inputform', ['locations' => $locations,
                              'member_types' => $member_types]);
} 
    
    public function browsehouseholds()
{
    $ids = App::get('database')->selectColumns('household_id', 'household');
    return view('browsehouseholds', ['ids' => $ids]);
}
    public function lastAdded()
{   
    
    $max_id = App::get('database')->selectMaxId();
    redirect('household?id='.$max_id);
}
    public function householdList()
{
    $households = App::get('database')
    ->selectClassAll('App\\Models\\Household');
    return view('householdlist', ['households' => $households]);
}



}