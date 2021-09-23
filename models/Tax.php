<?php

class Tax {
    public $type;
    public $type_en;
    public $amount;
    public $is_exused;

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