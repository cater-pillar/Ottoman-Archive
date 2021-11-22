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
                                  $fk_household_id) {
        if (!is_numeric($quantity)) {$quantity = null;};
        if (!is_numeric($rent_income)) {$rent_income = null;};
        return App::get('database')
        ->insert('real_estate_household', 
            [
                ':fk_real_estate_id' =>  $fk_real_estate_id,
                ':quantity' => $quantity,
                ':rent_income' => $rent_income,
                ':location' => $location,
                ':description' => $description,
                ':fk_household_id' => $fk_household_id
            ]);
    }

    static public function destroy($id) {
        return App::get('database')
        ->delete('real_estate_household', 
                'real_estate_household.fk_household_id', 
                $id);
    }

    static public function update($arr, $id) {
        if (!is_numeric($arr['quantity'])) {$arr['quantity'] = null;};
        if (!is_numeric($arr['rent_income'])) {$arr['rent_income'] = null;};

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
            real_estate.`name`,
            real_estate.`name_en`,
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
            real_estate.id = 
            real_estate_household.fk_real_estate_id
        ORDER BY
            real_estate.`name`";
        

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
                real_estate_household.fk_real_estate_id = real_estate.id
                GROUP BY
                real_estate_household.real_estate_household_id
                ORDER BY
                real_estate.`name`";
    }

}