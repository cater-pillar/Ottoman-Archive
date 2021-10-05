<?php

namespace App\Models;

use App\Core\App;

class HouseholdMember {

    public $id;
    public $type;
    public $type_en;

    static public function index()
    {
        return App::get('database')->selectAll('household_member_type', 'type');
    }


}