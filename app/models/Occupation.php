<?php

namespace App\Models;

use App\Core\App;

class Occupation {

    public $id;
    public $name;
    public $name_en;
    public $fk_occupation_id;

    static public function index()
    {
        return App::get('database')->selectAll('occupation', 'name');
    }


}