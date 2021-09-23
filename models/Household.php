<?php

class Household {
    public $location;
    public $id;
    public $number;
    public $member_forname;
    public $member_surname;
    public $member_type;
    public $member_type_en;
    public $notes;
    public $occupations = [];
    public $taxes = [];
    public $lands = [];
    public $real_estates = [];
    public $livestock = [];

    static public function select($id)
    {

        return
            "SELECT 
            location_name.`name` AS `location`, 
            household.`household_id` AS `id`, 
            household.`household_number` AS `number`, 
            household.`member_forname`, 
            household.`member_surname`, 
            household_member_type.`type` AS `member_type`,
            household_member_type.`type_en` AS `member_type_en`,
            household.`notes`
        FROM 
            location_name, 
            household, 
            household_member_type 
        WHERE 
            household.household_id = {$id} 
        AND 
            household.fk_location_name_id = 
            location_name.location_name_id 
        AND 
            household.fk_household_member_type_id = 
            household_member_type.household_member_type_id";
        

    }
    
    public function selectAll()
    {
        return
        "SELECT 
        location_name.`name` AS `location`, 
        household.`household_id` AS `id`, 
        household.`household_number` AS `number`, 
        household.`member_forname`, 
        household.`member_surname`, 
        household_member_type.`type` AS `member_type`,
        household_member_type.`type_en` AS `member_type_en`,
        household.`notes`
    FROM 
        location_name, 
        household, 
        household_member_type 
    WHERE 
        household.fk_location_name_id = 
        location_name.location_name_id 
    AND 
        household.fk_household_member_type_id = 
        household_member_type.household_member_type_id
    ORDER BY 
        `location`, `number`";
    }



    public function add($object, $array)
    {
        $this->$array = $object;
    }

  

    public function income($array) {
        $sum = 0;
        foreach ($this->$array as $item) {
            $sum+= $item->income;
        }
        return $sum;
    }

    public function totalIncome() {
        return $sum = $this->income('occupations')
              +$this->income('lands')
              +$this->income('real_estates')
              +$this->income('livestock');

    }
    
    public function totalTax() {
        $sum = 0;
        foreach ($this->taxes as $tax) {
            $sum+= $tax->amount;
        }
        return $sum;
    }

    static public function performEdit($column, $value, $id) {

        try {
            App::get('database')->edit(
                'household',
                $column,
                'household_id',
                $value,
                $id
            );
        }
        catch(Exception $e) {
            $e->getMessage();
        } 
    }
}