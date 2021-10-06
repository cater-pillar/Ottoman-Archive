<?php

namespace App\Models;

use App\Core\App;

class Land {

    public $id;
    public $type;
    public $type_en;

    static public function index() {
        return App::get('database')
        ->selectAll('land', 'type');
    }

    static public function create($parameters) {
        return App::get('database')
        ->insert('land', $parameters);
    }

    static public function show($id) {
        return App::get('database')
        ->select('land', 'type', 'land_id', $id);
    }

    static public function destroy($id) {
        return App::get('database')
        ->delete('land', 'land_id', $id);
    }

    static public function update($arr, $id) {
        return App::get('database')
        ->update($arr, 'land', 'land_id', $id);
    }
}