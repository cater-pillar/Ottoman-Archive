<?php

namespace App\Models;
use stdClass;
use App\Core\App;

class LocationType {

    public $id;
    public $type;
    public $type_en;

    function __construct(stdClass $object)
    {
        $this->id = $object->location_type_id;
        $this->type = $object->type;
        $this->type_en = $object->type_en;
    }




    static public function index()
    {
        $results = App::get('database')->selectAll('location_type', 'type');
        $final = [];
        foreach ($results as $result) {
            array_push($final, new LocationType($result));
        }
        return $final;
    }

    static public function show($id) {
        $result = App::get('database')
        ->select('location_type', 'type', 'location_type_id', $id)[0];
        
        return new LocationType($result);
    }

}