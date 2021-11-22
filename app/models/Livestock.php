<?php

namespace App\Models;

use App\Core\App;

class Livestock {

    public $id;
    public $name;
    public $name_en;

    static public function index() {
        return App::get('database')
        ->selectAll('livestock', 'name');
    }

    static public function create($parameters) {
        return App::get('database')
        ->insert('livestock', $parameters);
    }

    static public function show($id) {
        return App::get('database')
        ->select('livestock', 'name', 'id', $id);
    }

    static public function destroy($id) {
        return App::get('database')
        ->delete('livestock', 'id', $id);
    }

    static public function update($arr, $id) {
        return App::get('database')
        ->update($arr, 'livestock', 'id', $id);
    }


}