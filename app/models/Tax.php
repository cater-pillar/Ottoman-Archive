<?php

namespace App\Models;

use App\Core\App;

class Tax {

    public $id;
    public $type;
    public $type_en;

    static public function index()
    {
        return App::get('database')->selectAll('tax', 'type');
    }


}