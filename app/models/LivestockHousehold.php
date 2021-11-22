<?php

namespace App\Models;

use App\Core\App;

class LivestockHousehold {
    public $type;
    public $type_en;
    public $quantity;
    public $income;


    static public function create($fk_livestock_id,
                                  $quantity,
                                  $income,
                                  $fk_household_id)
    {
        if (!is_numeric($quantity)) {$quantity = null;};
        if (!is_numeric($income)) {$income = null;};
        return App::get('database')
        ->insert('livestock_household', 
            [
                ':fk_livestock_id' =>  $fk_livestock_id,
                ':quantity' => $quantity,
                ':income' => $income,
                ':fk_household_id' => $fk_household_id
            ]);
    }

    static public function destroy($id)
    {
        return App::get('database')
        ->delete('livestock_household', 
                'livestock_household.fk_household_id', 
                $id);
    }

    static public function update($arr, $id) {
        if (!is_numeric($arr['quantity'])) {$arr['quantity'] = null;};
        if (!is_numeric($arr['income'])) {$arr['income'] = null;};
        try {
            App::get('database')->update(
                $arr,
                'livestock_household',
                'livestock_household_id',
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
            livestock.`name`,
            livestock.`name_en`,
            livestock_household.quantity, 
            livestock_household.income  
        FROM 
            livestock_household, 
            livestock 
        WHERE 
            livestock_household.fk_household_id = {$id}
        AND 
            livestock.id = 
            livestock_household.fk_livestock_id
        ORDER BY
            livestock.`name`";
        

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
        livestock_household.fk_livestock_id = livestock.id
        GROUP BY
        livestock_household.livestock_household_id
        ORDER BY
        livestock.`name`";
    }

}