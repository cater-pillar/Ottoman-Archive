<?php

namespace App\Controllers;

use App\Core\App;
use App\Models\{Household, Land, Livestock, Occupation, RealEstate, Tax, Location, LocationType};

class PagesController {

    

    public function home()
{
    $members = App::get('database')->count('household_id', 'household');
    $occupations = App::get('database')->count('fk_occupation_id', 'occupation');

    return view('index', ['members' => $members, 'occupations' => $occupations]);
}


    
    public function browsehouseholds()
{
    $ids = App::get('database')->selectColumns('household_id', 'household');
    return view('browsehouseholds', ['ids' => $ids]);
}

public function filterhouseholds()
{
    $livestock = Livestock::index();
    
    return view('filterhouseholds', ['livestock' => $livestock]);
}
    public function lastAdded()
{   
    
    $max_id = App::get('database')->selectMaxId();
    redirect('household?id='.$max_id);
}


public function test() {
    $result = [];
    foreach($_GET as $key => $value) {
        if($value != "Submit") {
            $result[$key] = App::get('database')->byReference('livestock', $value);
        }
    }
    echo "<pre>";
    var_dump(array_intersect($result['livestock-10'], $result['livestock-17']));
    echo "</pre>";
}

}