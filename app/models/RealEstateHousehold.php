<?php

namespace App\Models;

use App\Core\App;

class RealEstateHousehold {
    public $type;
    public $type_en;
    public $quantity;
    public $income;
    public $location;
    public $description;


    static public function create($fk_real_estate_id,
                                  $quantity,
                                  $rent_income,
                                  $location,
                                  $description,
                                  $fk_household_id)
    {
        return App::get('database')->insert('real_estate_household', 
                [
                    ':fk_real_estate_id' =>  $fk_real_estate_id,
                    ':quantity' => $quantity,
                    ':rent_income' => $rent_income,
                    ':location' => $location,
                    ':description' => $description,
                    ':fk_household_id' => $fk_household_id
                ]);
    }

    static public function destroy($id)
    {
        return App::get('database')->delete('real_estate_household', 
                                     'real_estate_household.fk_household_id', 
                                     $id);
    }


    static public function update($arr, $id) {

        try {
            App::get('database')->update(
                $arr,
                'real_estate_household',
                'real_estate_household_id',
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
            real_estate.`type`,
            real_estate.`type_en`,
            real_estate_household.quantity,
            real_estate_household.rent_income AS `income`,
            real_estate_household.location, 
            real_estate_household.description  
        FROM 
            real_estate_household, 
            real_estate 
        WHERE 
            real_estate_household.fk_household_id = {$id} 
        AND 
            real_estate.real_estate_id = 
            real_estate_household.fk_real_estate_id
        ORDER BY
            real_estate.`type`";
        

    }


    static public function getId()
    {
        return  "SELECT
                real_estate_household.real_estate_household_id AS id
                FROM
                real_estate_household,
                real_estate
                WHERE
                fk_household_id = :id
                AND
                real_estate_household.fk_real_estate_id = real_estate.real_estate_id
                GROUP BY
                real_estate_household.real_estate_household_id
                ORDER BY
                real_estate.`type`";
    }

    static public function performEdit($column, $value, $id) {

        try {
            App::get('database')->edit(
                'real_estate_household',
                $column,
                'real_estate_household_id',
                $value,
                $id
            );
        }
        catch(Exception $e) {
            $e->getMessage();
        } 
       
    }
}