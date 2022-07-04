<?php

namespace App\Models;

use App\Core\App;

class Tax {

    public $id;
    public $type;
    public $type_en;

    private $table = 'tax';
    private $orderby = 'type';

    static public function index() {
        return App::get('database')
        ->selectAll('tax', 'type');
    }

    static public function create($parameters) {
        return App::get('database')
        ->insert('tax', $parameters);
    }

    static public function show($id) {
        return App::get('database')
        ->select('tax', 'type', 'tax_id', $id);
    }

    static public function destroy($id) {
        return App::get('database')
        ->delete('tax', 'tax_id', $id);
    }

    static public function update($arr, $id) {
        return App::get('database')
        ->update($arr, 'tax', 'tax_id', $id);
    }
}