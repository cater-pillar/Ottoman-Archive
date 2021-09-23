<?php

class Livestock {
    public $type;
    public $type_en;
    public $quantity;
    public $income;

    static public function select($id)
    {

        return
            "SELECT 
            livestock.`type`,
            livestock.`type_en`,
            livestock_household.quantity, 
            livestock_household.income  
        FROM 
            livestock_household, 
            livestock 
        WHERE 
            livestock_household.fk_household_id = {$id}
        AND 
            livestock.livestock_id = 
            livestock_household.fk_livestock_id
        ORDER BY
            livestock.`type`";
        

    }


    static public function getId()
    {
        return  "SELECT
        livestock_household.livestock_household_id AS id
        FROM
        livestock_household,
        livestock
        WHERE
        fk_household_id = :id
        AND
        livestock_household.fk_livestock_id = livestock.livestock_id
        GROUP BY
        livestock_household.livestock_household_id
        ORDER BY
        livestock.`type`";
    }

    static public function performEdit($column, $value, $id) {

        try {
            App::get('database')->edit(
                'livestock_household',
                $column,
                'livestock_household_id',
                $value,
                $id
            );
        }
        catch(Exception $e) {
            $e->getMessage();
        } 
       
    }
}