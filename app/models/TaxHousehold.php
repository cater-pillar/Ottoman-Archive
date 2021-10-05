<?php

namespace App\Models;

use App\Core\App;

class TaxHousehold {
    public $type;
    public $type_en;
    public $amount;
    public $is_exused;


    static public function create($fk_tax_id, 
                                  $amount, 
                                  $fk_household_id)
    {
        return App::get('database')->insert('tax_household', 
                [
                    ':fk_tax_id' =>  $fk_tax_id,
                    ':amount' => $amount,
                    ':fk_household_id' => $fk_household_id
                ]);
    }

    static public function destroy($id)
    {
        return App::get('database')->delete('tax_household', 
                                     'tax_household.fk_household_id', 
                                     $id);
    }

    static public function update($arr, $id) {

        try {
            App::get('database')->update(
                $arr,
                'tax_household',
                'tax_household_id',
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
            tax.`type`,
            tax.`type_en`,
            tax_household.amount, 
            tax_household.is_exused  
        FROM 
            tax_household, 
            tax 
        WHERE 
            tax_household.fk_household_id = {$id} 
        AND 
            tax.tax_id = tax_household.fk_tax_id
        ORDER BY
            tax.`type`";
    
    }


    static public function getId()
    {
        return  "SELECT
                tax_household.tax_household_id AS id
                FROM
                tax_household,
                tax
                WHERE
                fk_household_id = :id
                AND
                tax_household.fk_tax_id = tax.tax_id
                GROUP BY
                tax_household.tax_household_id
                ORDER BY
                tax.`type`";
    }

    static public function performEdit($column, $value, $id) {

        try {
            App::get('database')->edit(
                'tax_household',
                $column,
                'tax_household_id',
                $value,
                $id
            );
        }
        catch(Exception $e) {
            $e->getMessage();
        } 
       
    }
}