<?php

namespace App\Models;
use stdClass;
use App\Core\App;

class Occupation {

    public $id;
    public $name;
    public $name_en;
    public $fk_occupation_id;

    function __construct(stdClass $object)
    {
        $this->id = $object->occupation_id;
        $this->name = $object->name;
        $this->name_en = $object->name_en;
        $this->fk_occupation_id = $object->fk_occupation_id;
    }

    static public function index() {
        $results = App::get('database')->selectAll('occupation', 'name');
        $final = [];
        foreach ($results as $result) {
            array_push($final, new Occupation($result));
        }
    
        return $final;
    }

    static public function create($parameters) {
        return App::get('database')
        ->insert('occupation', $parameters);
    }

    static public function show($id) {
        $result = App::get('database')
        ->select('occupation', 'name', 'occupation_id', $id);
        return new Occupation($result);
    }

    static public function destroy($id) {
        return App::get('database')
        ->delete('occupation', 'occupation_id', $id);
    }

    static public function update($arr, $id) {
        return App::get('database')
        ->update($arr, 'occupation', 'occupation_id', $id);
    }

    static public function getTop() {
        return array_filter(Occupation::index(), function($a) {
            if (is_null($a->fk_occupation_id)) return $a;
        });
    }

    static public function getBottom() {
        $first = array_filter(Occupation::index(), function($a) {
            if (!is_null($a->fk_occupation_id) && $a->fk_occupation_id > 2) return $a;
        });

        
        $result = [];

        foreach($first as $value) {
            array_push($result, $value);
        }
        return $result;
    }

}