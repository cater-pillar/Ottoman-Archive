<?php

namespace App\Models;

use App\Core\App;

class RealEstate {
    public $type;
    public $type_en;
    public $quantity;
    public $income;
    public $location;
    public $description;

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