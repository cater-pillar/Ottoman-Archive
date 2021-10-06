<?php

namespace App\Models;

use App\Core\App;

class RealEstate {

    public $id;
    public $type;
    public $type_en;

    static public function index() {
        return App::get('database')
        ->selectAll('real_estate', 'type');
    }

    static public function create($parameters) {
        return App::get('database')
        ->insert('real_estate', $parameters);
    }

    static public function show($id) {
        return App::get('database')
        ->select('real_estate', 'type', 'real_estate_id', $id);
    }

    static public function destroy($id) {
        return App::get('database')
        ->delete('real_estate', 'real_estate_id', $id);
    }

    static public function update($arr, $id) {
        return App::get('database')
        ->update($arr, 'real_estate', 'real_estate_id', $id);
    }

}