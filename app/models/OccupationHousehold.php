<?php

namespace App\Models;

use App\Core\App;

class OccupationHousehold {
    public $name;
    public $name_en;
    public $income;
    public $type;


    static public function create($fk_occupation_id, 
                                  $income, 
                                  $fk_household_id, 
                                  $type)
    {
        return App::get('database')->insert('occupation_household', 
                [
                    ':fk_occupation_id' => $fk_occupation_id,
                    ':income' => $income,
                    ':fk_household_id' => $fk_household_id,
                    ':type' => $type
                ]);
    }


    static public function destroy($id)
    {
        return App::get('database')->delete('occupation_household', 
                                     'occupation_household.fk_household_id', 
                                     $id);
    }


    static public function update($arr, $id) {

        try {
            App::get('database')->update(
                $arr,
                'occupation_household',
                'occupation_household_id',
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
            occupation.`name`, 
            occupation.`name_en`,
            occupation_household.income, 
            occupation_household.`type`  
        FROM 
            occupation_household, 
            occupation 
        WHERE 
            occupation_household.fk_household_id = {$id}
        AND 
            occupation.occupation_id = 
            occupation_household.fk_occupation_id
        ORDER BY
            occupation.`name`";
        

    }


    static public function getId()
    {
        return  "SELECT
                occupation_household_id AS id
                FROM
                occupation_household
                WHERE
                fk_household_id = :id";
    }

    static public function performEdit($column, $value, $id) {

        try {
            App::get('database')->edit(
                'occupation_household',
                $column,
                'occupation_household_id',
                $value,
                $id
            );
        }
        catch(Exception $e) {
            $e->getMessage();
        }    
    }
}