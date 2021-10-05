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
                                  $fk_household_id)
    {
        return App::get('database')->insert('land_household', 
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

    static public function destroy($id)
    {
        return App::get('database')->delete(
            "land_household", 
            "land_household.fk_household_id", 
            $id);
    }


    static public function update($arr, $id) {

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

    static public function select($id)
    {

        return
            "SELECT 
            land.`type`,
            land.`type_en`, 
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
            land.land_id = land_household.fk_land_id
        ORDER BY
            land.`type`";
    }

    static public function getId()
    {
        return  "SELECT
        land_household.land_household_id AS id
        FROM
        land_household,
        land
        WHERE
        fk_household_id = :id
        AND
        land_household.fk_land_id = land.land_id
        GROUP BY
        land_household.land_household_id
        ORDER BY
        land.`type`";
    }

    static public function performEdit($column, $value, $id) {

        try {
            App::get('database')->edit(
                'land_household',
                $column,
                'land_household_id',
                $value,
                $id
            );
        }
        catch(Exception $e) {
            $e->getMessage();
        } 
       
    }
}