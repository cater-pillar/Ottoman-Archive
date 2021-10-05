<?php

namespace App\Models;

use App\Core\App;

class Land {

    public $id;
    public $type;
    public $type_en;

    static public function index()
    {
        return App::get('database')->selectAll('land', 'type');
    }


}