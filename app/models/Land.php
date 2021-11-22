<?php

namespace App\Models;

use App\Core\App;

class Land {

    public $id;
    public $name;
    public $name_en;

    static public function index() {
        return App::get('database')
        ->selectAll('land', 'name');
    }

    static public function create($parameters) {
        return App::get('database')
        ->insert('land', $parameters);
    }

    static public function show($id) {
        return App::get('database')
        ->select('land', 'name', 'id', $id);
    }

    static public function destroy($id) {
        return App::get('database')
        ->delete('land', 'id', $id);
    }

    static public function update($arr, $id) {
        return App::get('database')
        ->update($arr, 'land', 'id', $id);
    }
}