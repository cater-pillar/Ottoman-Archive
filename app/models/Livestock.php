<?php

namespace App\Models;

use App\Core\App;

class Livestock {

    public $id;
    public $type;
    public $type_en;

    static public function index() {
        return App::get('database')
        ->selectAll('livestock', 'type');
    }

    static public function create($parameters) {
        return App::get('database')
        ->insert('livestock', $parameters);
    }

    static public function show($id) {
        return App::get('database')
        ->select('livestock', 'type', 'livestock_id', $id);
    }

    static public function destroy($id) {
        return App::get('database')
        ->delete('livestock', 'livestock_id', $id);
    }

    static public function update($arr, $id) {
        return App::get('database')
        ->update($arr, 'livestock', 'livestock_id', $id);
    }


}