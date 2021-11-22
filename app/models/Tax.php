<?php

namespace App\Models;

use App\Core\App;

class Tax {

    public $id;
    public $name;
    public $name_en;

    static public function index() {
        return App::get('database')
        ->selectAll('tax', 'name');
    }

    static public function create($parameters) {
        return App::get('database')
        ->insert('tax', $parameters);
    }

    static public function show($id) {
        return App::get('database')
        ->select('tax', 'name', 'id', $id);
    }

    static public function destroy($id) {
        return App::get('database')
        ->delete('tax', 'id', $id);
    }

    static public function update($arr, $id) {
        return App::get('database')
        ->update($arr, 'tax', 'id', $id);
    }
}