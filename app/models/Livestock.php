<?php

namespace App\Models;

use App\Core\App;

class Livestock {

    public $id;
    public $type;
    public $type_en;

    static public function index()
    {
        return App::get('database')->selectAll('livestock', 'type');
    }


}