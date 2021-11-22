<?php

namespace App\Models;

use App\Core\App;

class RealEstate {

    public $id;
    public $name;
    public $name_en;

    static public function index() {
        return App::get('database')
        ->selectAll('real_estate', 'name');
    }

    static public function create($parameters) {
        return App::get('database')
        ->insert('real_estate', $parameters);
    }

    static public function show($id) {
        return App::get('database')
        ->select('real_estate', 'name', 'id', $id);
    }

    static public function destroy($id) {
        return App::get('database')
        ->delete('real_estate', 'id', $id);
    }

    static public function update($arr, $id) {
        return App::get('database')
        ->update($arr, 'real_estate', 'id', $id);
    }

}