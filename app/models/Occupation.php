<?php

namespace App\Models;

use App\Core\App;

class Occupation {

    public $id;
    public $name;
    public $name_en;
    public $fk_occupation_id;

    static public function index() {
        return App::get('database')
        ->selectAll('occupation', 'name');
    }

    static public function create($parameters) {
        return App::get('database')
        ->insert('occupation', $parameters);
    }

    static public function show($id) {
        return App::get('database')
        ->select('occupation', 'name', 'id', $id);
    }

    static public function destroy($id) {
        return App::get('database')
        ->delete('occupation', 'id', $id);
    }

    static public function update($arr, $id) {
        return App::get('database')
        ->update($arr, 'occupation', 'id', $id);
    }

}