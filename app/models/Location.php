<?php

namespace App\Models;
use stdClass;
use App\Core\App;

class Location {

    public $id;
    public $name;
    public $fk_location_type_id;
    public $fk_location_name_id;
    public $type;
    public $type_en;
    public $district;
    public $district_id;
    public $city;
    public $city_id;

    function __construct(stdClass $object)
    {
        $this->id = $object->location_name_id;
        $this->name = $object->name;
        $this->fk_location_type_id = $object->fk_location_type_id;
        $this->fk_location_name_id = $object->fk_location_name_id;
        $location_types = LocationType::index();
        foreach($location_types as $type) {
            if($this->fk_location_type_id == $type->id) {
                $this->type = $type->type;
                $this->type_en = $type->type_en;
            }
        }
        $cities = Location::getCities();
        $districts = Location::getDistricts();
        foreach($cities as $city) {
            if($city->location_name_id == $this->fk_location_name_id) {
                $this->city = $city->name;
                $this->city_id = $city->location_name_id;
                $this->district_id = $city->fk_location_name_id;
            }
        }
        foreach($districts as $district) {
            if($district->location_name_id == $this->district_id) {
                $this->district = $district->name;
            }
        }
    }




    static public function index()
    {   
        $results = App::get('database')->selectAll('location_name', 'name');
        $final = [];
        foreach ($results as $result) {
            array_push($final, new Location($result));
        }   
        return $final;
    }

    static public function show($id) {
        $result = App::get('database')
        ->select('location_name', 'name', 'location_name_id', $id)[0];
        
        return new Location($result);
    }

    static public function getCityAreas($city_id) {
        $first = array_filter(Location::index(), function($a, $city_id) {
            if (!is_null($a->fk_location_name_id) && 
                $a->fk_location_type_id !== 1 &&
                $a->fk_location_name_id = $city_id) return $a;
        }, $city_id);

        $result = [];

        foreach($first as $value) {
            array_push($result, $value);
        }
        return $result;
    }

    static public function getDistricts() {
        return App::get('database')->select('location_name', 'name', 'fk_location_type_id', 2);
    }

    static public function getCities() {
        return App::get('database')->select('location_name', 'name', 'fk_location_type_id', 1);
    }
}