<?php

namespace App\Models;

use App\Core\App;

class Location {

    public $id;
    public $name;
    public $fk_location_type_id;
    public $fk_location_name_id;

    static public function index()
    {
        return App::get('database')->selectAll('location_name', 'name');
    }


}