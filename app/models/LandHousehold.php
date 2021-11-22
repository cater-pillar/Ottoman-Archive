<?php

namespace App\Models;

use App\Core\App;

class LandHousehold {
    
    public $type;
    public $type_en;
    public $area;
    public $income;
    public $payed_rent;
    public $location;
    public $description;


    static public function create($fk_land_id,
                                  $area,
                                  $income,
                                  $payed_rent,
                                  $location,
                                  $description,
                                  $fk_household_id) {
        if (!is_numeric($area)) {$area = null;};
        if (!is_numeric($income)) {$income = null;};
        if (!is_numeric($payed_rent)) {$payed_rent = null;};
        return App::get('database')
        ->insert('land_household', 
            [
                ':fk_land_id' =>  $fk_land_id,
                ':area' => $area,
                ':income' => $income,
                ':payed_rent' => $payed_rent,
                ':location' => $location,
                ':description' => $description,
                ':fk_household_id' => $fk_household_id
            ]);
    }

    static public function destroy($id) {
        return App::get('database')
        ->delete(
            "land_household", 
            "land_household.fk_household_id", 
            $id);
    }

    static public function update($arr, $id) {
        if (!is_numeric($arr['area'])) {$arr['area'] = null;};
        if (!is_numeric($arr['income'])) {$arr['income'] = null;};
        if (!is_numeric($arr['payed_rent'])) {$arr['payed_rent'] = null;};
        try {
            App::get('database')->update(
                $arr,
                'land_household',
                'land_household_id',
                $id
            );
        }
        catch(Exception $e) {
            $e->getMessage();
        } 
    }




    static public function select($id) {

        return
            "SELECT 
            land.`name`,
            land.`name_en`, 
            land_household.area, 
            land_household.income,
            land_household.payed_rent, 
            land_household.location, 
            land_household.description  
        FROM 
            land_household, 
            land 
        WHERE 
            land_household.fk_household_id = {$id} 
        AND 
            land.id = land_household.fk_land_id
        ORDER BY
            land.`name`";
    }

    static public function getId() {
        return  "SELECT
        land_household.land_household_id AS id
        FROM
        land_household,
        land
        WHERE
        fk_household_id = :id
        AND
        land_household.fk_land_id = land.id
        GROUP BY
        land_household.land_household_id
        ORDER BY
        land.`name`";
    }

}