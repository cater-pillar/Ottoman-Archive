<?php

namespace App\Models;

use App\Core\App;

class Land {
    
    public $type;
    public $type_en;
    public $area;
    public $income;
    public $payed_rent;
    public $location;
    public $description;
    /**
     * Class constructor.
     */
  /*   public function __construct($type, $type_en, 
    $area, $income, $payed_rent, $location, $description)  {
        $this->area = $area;
        $this->income = $income;
        $this->payed_rent = $payed_rent;
        $this->location = $location;
        $this->description = $description;
    } */

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